<template>
     <div>
        <spinner v-if="loading"></spinner>
        <div v-else-if="thread">
            <div class="container">
                <div class="jumbotron">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{ name: 'categories' }">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{ name: 'forum', params: { id: thread.forum.id } }">{{ thread.forum.title }}</router-link></li>
                            <li class="breadcrumb-item">{{ thread.title }}</li>
                        </ol>
                    </nav>

                    <h1 class="display-5">{{ thread.title }}</h1>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <!-- Posts -->

                        <div v-for="(post,index) in thread.posts.data" :key="index">
                            <img class="image" :src="baseUrl + '/images/user.png'" style="vertical-align: top;"/>
                            <div class="post-container">
                                <span>{{ post.user.name }}</span>
                                <span style="margin-left: 5px; color: #3d4852;">DICE:</span>

                                <hr>

                                <p v-html="post.body" style="margin-top: 20px; margin-bottom: 20px"></p>

                                <hr>

                                <p style="margin-top: 10px; margin-bottom: 0; color: #3d4852">
                                    <small>
                                        {{ post.created_at | friendlyDate }}
                                    </small>
                                </p>
                            </div>
                        </div>

                        <!-- Pagination Bottom -->
                        

                        <!-- Reply Button -->

                        <div v-if="app.user">
                            <button v-if="!replyMode" @click="replyMode=true"
                                    type="button" class="btn btn-lg btn-success">
                                Envía
                            </button>

                            <button v-else @click="replyMode=false"
                                    type="button" class="btn btn-lg btn-danger">
                                Cancelar
                            </button>
                        </div>

                        <!-- Reply Form -->

                        <div v-if="replyMode" style="margin-top: 20px">

                            <div v-if="errorBody" class="alert alert-danger">
                                {{ errorBody }}
                            </div>

                            <form v-on:submit.prevent="onSubmit">
                                <quill-editor v-model="body" ref="myQuillEditor" style="height: 300px; margin-bottom: 80px"
                                              :options="editorOption">
                                </quill-editor>

                                <button class="btn btn-lg btn-success float-right" style="margin-bottom: 50px">Responder</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- active threads component -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";

import { quillEditor } from "vue-quill-editor";

export default {
    name: 'thread',
    componentes: { quillEditor },
    props: ['app'],
    data() {
        return {
            threadId: this.$route.params.id,
            thread: null,
            baseUrl: BASE_URL,
            replyMode: false,
            body: '',
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
            errorBody: null,
            loading: false,
            totalPages: null
        };
    },

    mounted() {
        this.getThread();
    },

    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },
    
    watch: {
        '$route.params.id': function(newVal) {
            this.thread = null;
            this.currentPage = 1;
            this.getThread(newVal); 
        }
    },

    methods: {
        getThread(newVal) {
            this.loading = true;
            let page = 1;
            if(this.currentPage) {
                page = this.currentPage;
            }

            if(newVal) {
                this.threadId = newVal;
            }

            this.app.req.get('thread/'+this.threadId+'?page='+page).then(response => {
                this.loading = false;
                console.log(response.data)
                if(response.data.id) {
                    this.thread = response.data;
                    this.totalPages = this.thread.posts.last_page;
                }
            });
        },

        /* click page func */

        onSubmit() {
            if(!this.body) {
                this.errorBody = 'Escribe algo, vago!';
            }
            else {
                this.errorBody = null;
            }

            if(!this.errorBody) {
                let data = {
                    body: this.body,
                    thread_id: this.threadId
                }

                this.app.req.post('post/create', data).then(response => {
                    this.replyMode = false;
                    this.body = '';

                    this.app.activeThreads.unshift(response.data);

                    let pageToGoTo = 1;
                    let reminder = this.thread.posts.total % 10;

                    if(reminder>0) {
                        pageToGoTo = this.thread.posts.last_page;
                    }
                    else if (remainder === 0) {
                        pageToGoTo = this.thread.posts.last_page+1;
                    }
                    else {
                        pageToGoTo = null;
                    }
                    if(pageToGoTo) {
                        //this.app.$pagination.clickPage(pageToGoTo);
                    }
                })
            }
        }
    }
}

</script>

<style>
    p, h1, ol {
        margin-bottom: 0 !important;
    }

    .post-container {
        border: 2px solid #3d4852;
        background-color: #bfbfb3;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 25px;
        color: white;
        display: inline-block;
        width: calc(100% - 90px);
        margin-left: 10px;
    }
    
    .post-container::before {
        content: ' ';
        position: absolute;
        border: 7px solid transparent;
        left: 90px;
        border-right-color: #3d4852;
    }
    
    .image {
        height: 75px;
    }

</style>