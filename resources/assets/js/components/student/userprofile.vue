<template lang="html">
  <div class="user-profile-container ">
    <div class="user-profile-details z-depth-1">
      <div class="user-picture ">
          <label class="header">Basic profile</label>
          <img src="images/uploads/avatar.jpg" alt="">
          <label>09036</label>
      </div>
      <div class="user-details ">
          <label for="">Nazareno Gladys</label>
          <label for="">BSIT-04</label>
          <label for="">20</label>
          <label for="">Female</label>
          <label for="">Big City, New york</label>
      </div>
    </div>
    <div class="account-details ">
      <div class="account-content z-depth-1">
        <label class="header">Update your account</label>
          <div class="input-field">
           <i class="material-icons prefix">account_circle</i>
           <input id="icon_prefix" type="text" class="validate">
           <label for="icon_prefix">Username</label>
         </div>
         <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Old Password</label>
        </div>
        <div class="input-field">
           <i class="material-icons prefix">lock_open</i>
           <input id="icon_prefix" type="password" class="validate">
           <label for="icon_prefix">New Password</label>
       </div>
       <div class="input-field">
          <i class="material-icons prefix">lock_outline</i>
          <input id="icon_prefix" type="password" class="validate">
          <label for="icon_prefix">Confirm Password</label>
        </div>
        <button class="btn waves-effect waves-light right" type="submit" name="action">update
          <i class="material-icons right">send</i>
        </button>
      </div>
      <div class="right-profile">
        <div class="right-profile-one  z-depth-1">
          <label class="header">Something to put</label>
            <div class="input-field">
             <i class="material-icons prefix">account_circle</i>
             <input id="icon_prefix" type="text" class="validate">
             <label for="icon_prefix">Username</label>
           </div>
        </div>
        <div class="right-profile-one  z-depth-1">
          <label class="header">Something to put</label>
            <div class="input-field">
             <i class="material-icons prefix">account_circle</i>
             <input id="icon_prefix" type="text" class="validate">
             <label for="icon_prefix">Username</label>
           </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>
