<template>
    <div>
        <h3 class="text-center">Edit Campaign</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCampaign">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="campaign.name">
                    </div>
                     <div class="form-group">
                        <label>Start Date</label>
                        <input type="datetime" class="form-control" v-model="campaign.from" required>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="datetime" class="form-control" v-model="campaign.to" required>
                    </div>
                     <div class="form-group">
                        <label>Daily Budget</label>
                        <input type="number" class="form-control" v-model="campaign.daily_budget" required>
                    </div>
                     <div class="form-group">
                        <label>Total Budget</label>
                        <input type="number" class="form-control" v-model="campaign.total_budget" required>
                    </div>
                    <reusable-button :config="{'class': 'btn-primary','text':'Update','type':'submit'}"></reusable-button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    import ReusableButton from './Button.vue';
    export default {
        data() {
            return {
                campaign: {},
                images:[],
            }
        },
        components:{
            ReusableButton
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/campaigns/${this.$route.params.id}`)
                .then((res) => {
                    this.campaign = res.data;
                    this.images = res.data.images;
                });
        },
        methods: {
            updateCampaign() {
                this.axios
                    .patch(`http://localhost:8000/api/campaigns/${this.$route.params.id}`, this.campaign)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>