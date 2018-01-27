<template lang="html">
  <div class="todos-container">
    <div class="todos-header green">
      <label class="todos-label ">My Todos</label>
      <a href="#todos" v-on:click="isUpdate = true" class="btn-flat waves-effect waves-light accent-1 modal-trigger" style="color:#ffffff">Add new</a>
    </div>
    <div class="todos-content">
      <ul class="collection">
       <li class="collection-item avatar" v-for="todo in todos">
          <i class="material-icons circle green">assignment</i>
          <div class="collection-content">
            <label class="grey-text text-darken-1">{{todo.title}}</label>
            <label id="todo-date"class="right">
              {{todo.created_at}}
              <a href="#" v-on:click.prevent="deleteTodo(todo.id)" style="margin-left:10px;"><i class="material-icons amber" style="font-size:10px;">close</i></a>
            </label>
            <p class="grey-text text-darken-1">{{todo.description}}</p>
          </div>
       </li>
     </ul>
    </div>
    <!-- todos modal -->
    <div id="todos" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="modal-header green">
          <h4 id="todos-header">Create a Todo</h4>
        </div>
        <div class="modal-fields">
          <div class="input-field">
            <i class="material-icons prefix" style="color:#4caf50!important;">title</i>
            <input id="todos-title" v-model="title" style="color:#4caf50!important;" type="text" required class="validate" >
            <label for="todos-title" style="color:#4caf50!important;" id="label-title">Title</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix" style="color:#4caf50!important;">description</i>
            <textarea id="todos-description" v-model="description" style="color:#4caf50!important;" required class="materialize-textarea validate"></textarea>
            <label for="todos-description" style="color:#4caf50!important;" id="label-desc" >Description</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="cancel" class="btn btn-flat waves-effect waves-light white modal-close">Cancel</a>
        <a class="btn waves-effect waves-light modal-close green" v-on:click="addTodos()">Add</a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

  export default {
    data(){
      return{
        title : '',
        description : '',
        isUpdate:false,
        headerTitle:false,
        todos:[],
      }
    },

    mounted(){
      this.showTodos();
    },

    methods:{

      showTodos(){
        var vm = this;
        axios.get(`todos-data`).then(function(response){
          vm.todos = response.data.todos.data;
        });
      },

      addTodos(){
        var vm = this;
        axios.post(`create-todo`,{
          'title' : this.title,
          'description' : this.description
        }).then(function(response){
          vm.showTodos();
          Materialize.toast('Todo created !' ,3000,'rounded');
          console.log(response);
        }).catch(function(error){
          Materialize.toast('Something went wrong !' ,3000,'rounded');
          console.log(error);
        });
      },

    deleteTodo(id){
        if(confirm("Are you sure to delete ?")){
          var vm = this;
          axios.delete(`delete-todo/` + id).then(function(response){
            vm.showTodos();
            Materialize.toast('Todo deleted !',3000,'rounded');
          }).catch(function(error){
            console.log(error);
          });
        }
      }
    },
  }

</script>
