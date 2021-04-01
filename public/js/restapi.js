const get = async () => {
  let res = await fetch("http://localhost/web_mvc/app/api/category/get.php");
  let { data } = await res.json();

  let content = "";

  data.forEach(
    ({ title, body }) =>
      (content += `
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body"> 
                    <h5 class="card-title">${title}</h5>
                    <p class="card-text">${body}</p>
                </div>
            </div>
        </div

    `)
  );
  document.querySelector(".row").innerHTML = content;
};

get();
