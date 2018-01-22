<template lang="html">
  <div class="content-container ">
    <form method="post">
      <div class="content-header z-depth-1">
        <label class="verification">Verifications </label>
        <input type="text" name="numberVerification" id="number-of-verification" placeholder="Please provide only number">
        <a class="waves-effect waves-light btn blue darken-1 generate">Generate</a>
      </div>
    </form>
    <div class="verification-tab z-depth-1">
     <div class="tabs-container">
       <ul class="tabs">
         <li class="tab"><a href="#verification" class="active" >Verifications</a></li>
         <li class="tab"><a href="#activated">Activated</a></li>
         <li class="tab"><a href="#notactivated">Not Activated</a></li>
       </ul>
     </div>
     <div id="verification">
        <div class="verification-list">
          <table class="striped">
            <thead>
              <tr>
                <th>Verification</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>asldkfjdkfldk </td>
                <td>Used</td>
              </tr>
              <tr>
                <td>asldkfjdkfldk </td>
                <td>Not Used</td>
                <td></td>
              </tr>
              <tr>
                <td>asldkfjdkfldk </td>
                <td>Not Used</td>
                <td></td>
              </tr>
              <tr>
                <td>asldkfjdkfldk </td>
                <td>Used</td>
              </tr>
              <tr>
                <td>asldkfjdkfldk </td>
                <td>Used</td>
              </tr>
            </tbody>
          </table>
        </div>
     </div>
     <div id="activated">
       <div class="verification-list">
         <table class="striped">
           <thead>
             <tr>
                 <th>Verification</th>
                 <th>Status</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>asdfkdjudlk</td>
               <td>used</td>
             </tr>
             <tr>
               <td>asdfkdjudlk</td>
               <td>used</td>
             </tr>
             <tr>
               <td>asdfkdjudlk</td>
               <td>used</td>
             </tr>
             <tr>
               <td>asdfkdjudlk</td>
               <td>used</td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
     <div id="notactivated">
       <div class="verification-list">
         <table class="striped">
           <thead>
             <tr>
                 <th>Verification</th>
                 <th>Status</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>asdjkhfdiufknlkiw</td>
               <td>Not used</td>
             </tr>
             <tr>
               <td>asdjkhfdiufknlkiw</td>
               <td>Not used</td>
             </tr>
             <tr>
               <td>asdjkhfdiufknlkiw</td>
               <td>Not used</td>
             </tr>
             <tr>
               <td>asdjkhfdiufknlkiw</td>
               <td>Not used</td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
     <div class="pagination-container">
       <ul class="pagination">
         <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
         <li class="active"><a href="#!">1</a></li>
         <li class="waves-effect waves-light"><a href="#!">2</a></li>
         <li class="waves-effect waves-light"><a href="#!">3</a></li>
         <li class="waves-effect waves-light"><a href="#!">4</a></li>
         <li class="waves-effect waves-light"><a href="#!">5</a></li>
         <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
       </ul>
     </div>
   </div>
 </div>
</template>

<script>
export default {
}
</script>
