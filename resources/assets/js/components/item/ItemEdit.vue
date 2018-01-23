
<template>
    <div>
        <div class="form-group">
            <router-link to="/item" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit Item</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">item name</label>
                            <input type="text" v-model="item.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">item address</label>
                            <input type="text" v-model="item.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">item website</label>
                            <input type="text" v-model="item.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">item email</label>
                            <input type="text" v-model="item.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.itemId = id;
            axios.get('/api/v2/items/' + id)
                .then(function (resp) {
                    app.item = resp.data;
                })
                .catch(function () {
                    alert("Could not load your item")
                });
        },
        data: function () {
            return {
                itemId: null,
                item: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newItem = app.item;
                axios.patch('/api/v2/items/' + app.itemId, newItem)
                    .then(function (resp) {
                        app.$router.replace('/item');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
