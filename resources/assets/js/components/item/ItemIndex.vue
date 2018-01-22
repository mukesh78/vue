<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'itemCreate'}" class="btn btn-success">Create new Item</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Item list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in items">
                        <td>{{ item.name }}</td>
                        <td>{{ item.address }}</td>
                        <td>{{ item.website }}</td>
                        <td>{{ item.email }}</td>
                        <td>
                            <router-link :to="{name: 'editItem', params: {id: item.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(item.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                items: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v2/items')
                .then(function (resp) {
                    app.items = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load item");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v2/items/' + id)
                        .then(function (resp) {
                            app.items.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete item");
                        });
                }
            }
        }
    }
</script>
