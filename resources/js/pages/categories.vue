<template>
    <div>
        <spinner v-if="loading"></spinner>
        <div v-else>
            <div class="container" v-for="(category, index) in categories" :key="index" style="margin-bottom:13px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{ category.title }}
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-center align-content-center"
                                        style="height: 100px"
                                        v-for="(forum, forumIndex) in category.fora" :key="forumIndex"> 
                                        <div style="width: 40%; display: inline-block;">
                                            <h5 style="line-height:75px"> 
                                                <router-link :to="{ name: 'forum', params: { id: forum.id } }">
                                                    {{ forum.title }} 
                                                </router-link>
                                            </h5>
                                        </div>
                                        <div style="width: 20%; display: inline-block; text-align: center">
                                            <span style="line-height: 75px">
                                                {{ forum.views }} / <strong> {{ forum.replies -1 }} </strong>
                                            </span>
                                        </div>
                                        <div style="width: 40%; display: inline-block; padding-top: 15px" v-if="forum.latest">
                                            <router-link :to="{ name: 'thread', params: { id: forum.latest.thread_id } }">
                                                {{ forum.latest.thread_title }}
                                            </router-link>
                                            <br> 
                                            <span> by {{ forum.latest.user.name }} &middot;
                                                {{ forum.latest.created_at | friendlyDate}} 
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    name: 'categories',
    components: {},
    props: ['app'],

    data() {
        return {
            categories: null,
            loading: false,
        }
    },

    filters: {
        friendlyDate(value) {
            return moment(value).fromNow();
        }
    },

    mounted() {
        this.getCategories();
    },

    methods: {
        getCategories() {
            this.loading = true;

            this.app.req.get("categories").then(response => {
                this.loading = false;
                this.categories = response.data;
            });
        }
    }
}

</script>

<style>

</style>