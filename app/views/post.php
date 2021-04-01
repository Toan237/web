 <div class="container">

     <button type="button" class="btn btn-primary addBtn" data-toggle="modal" data-target="#exampleModal">
         <image src="<?php echo BASE_URL ?>/public/images/plus.svg" class="icon-btn" />
         ADD
     </button>
     <div class="row " style="padding: 40px 0;">

     </div>


     <!-- MOdDAL -->

     <!-- Button trigger modal -->



     <div class="notify">

     </div>


 </div>

 <!-- Add Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <form class="form">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                     </div>
                     <div class="form-group">
                         <label for="body">Body</label>
                         <input type="text" class="form-control" id="body" name="body" placeholder="Enter body">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </div>
         </div>
     </form>
 </div>
 <!-- Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
     <form class="form">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" class="form-control" id="editTitle" name="title" placeholder="Enter title">
                     </div>
                     <div class="form-group">
                         <label for="body">Body</label>
                         <input type="text" class="form-control" id="editBody" name="body" placeholder="Enter body">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </div>
         </div>
     </form>
 </div>



 <script>
     function notify(message) {
         const notify = document.querySelector('.notify')
         notify.textContent = message;
         notify.classList.add("active");

         setTimeout(() => {
             notify.classList.remove('active')
         }, 2000)
     }



     const get = async () => {
         let res = await fetch("http://localhost/web_mvc/app/api/category/get.php");


         let {
             data
         } = await res.json();

         let content = "";

         data.forEach(
             ({
                 title,
                 body,
                 id
             }) =>
             (content += `<div class="col-4"><div class="each"><h3>${title}</h3><p>${body}</p><div class="deleteBtn" data-id="${id}"><img src='<?php echo BASE_URL ?>/public/images/delete.svg' data-id="${id}"/></div><div class="editBtn" data-id="${id}"> <image src="<?php echo BASE_URL ?>/public/images/pencil.svg" data-id="${id}"/></div></div></div>`)
         );



         // DELETE
         document.querySelector(".row").innerHTML = content;

         const deleteBtns = document.querySelectorAll(".deleteBtn");

         deleteBtns.forEach(deleteBtn => {
             deleteBtn.addEventListener('click', async (e) => {
                 let id = e.target.getAttribute('data-id');

                 let res = await fetch("http://localhost/web_mvc/app/api/category/delete.php", {
                     method: "DELETE",
                     headers: {
                         "Content-Type": "application/json"
                     },
                     body: JSON.stringify({
                         id
                     })
                 })
                 get();
                 notify("Deleted successfully");

             })

         })


         // Edit 
         const editBtns = document.querySelectorAll(".editBtn");

         editBtns.forEach(editBtn => {
             editBtn.addEventListener('click', async (e) => {
                 let id = e.target.getAttribute('data-id');

                 let res = await fetch(`http://localhost/web_mvc/app/api/category/getsingle.php?id=${id}`);

                 let data = await res.json();


                 $('#editModal').modal('show');
                 document.getElementById("editTitle").value = data.title;
                 document.getElementById("editBody").value = data.body;


                 document.getElementById("editModal").addEventListener("submit", async (e) => {
                     e.preventDefault();
                     let {
                         editTitle,
                         editBody
                     } = e.target.elements;


                     let res = await fetch("http://localhost/web_mvc/app/api/category/update.php", {
                         method: "PUT",
                         headers: {
                             "Content-Type": "application/json"
                         },
                         body: JSON.stringify({
                             id,
                             title: editTitle.value,
                             body: editBody.value
                         })
                     })
                     const aaaa = await res.json();

                     $('#editModal').modal('hide');
                     get();
                     notify("Update successfully");
                 })

             })

         })


     };




     get();


     const form = document.querySelector('.form');

     form.addEventListener('submit', async (e) => {
         e.preventDefault();

         $('#exampleModal').modal('hide')


         try {
             const {
                 title,
                 body
             } = e.target.elements;


             let res = await fetch("http://localhost/web_mvc/app/api/category/post.php", {
                 method: "POST",
                 headers: {
                     "Content-Type": "application/json"
                 },
                 body: JSON.stringify({
                     title: title.value,
                     body: body.value
                 })
             })
             const a = await res.json();


             if (a.message === "Post created successfully") {
                 get();
                 notify(a.message);
             } else {

             }

         } catch (error) {
             console.dir(error);
         }

     })
 </script>