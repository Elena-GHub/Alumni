<template>
    <div>

      <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search" v-model="search">
      </div>

    </div>
</template>

<script>
    export default {
      name: 'SearchBar',
      data() {
        return {
          search: ''
        }
      },
      computed: {
        filterJobOffers() {
          return this.jobOfferList.filter((jobOffer) => {
              return jobOffer.position.toLowerCase().match(this.search.toLowerCase());
          });
        }
      },
      mounted() {
          console.log('Component mounted.')
      }
    }
</script>
