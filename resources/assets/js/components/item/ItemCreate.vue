
<template>
    <div>
        <div class="form-group">
            <router-link to="/item" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new item</div>
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
                            <label class="control-label">Item address</label>
                            <input type="text" v-model="item.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Item website</label>
                            <input type="text" v-model="item.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Item email</label>
                            <input type="text" v-model="item.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
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
                axios.post('/api/v2/items', newItem)
                    .then(function (resp) {
                      console.log(resp);
                      // app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your item");
                    });
            }
        }
    }
</script>
