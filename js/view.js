let img = document.querySelector("#imgApi");
let text = document.querySelector("#text");
let title = document.querySelector("#title");
window.addEventListener("load", () => {
    const posts = fetch("https://jsonplaceholder.typicode.com/users").then(
        (res) => res.json()
    );
    posts.then((result) => {
        const recipes = document.querySelector("#recipes");

        // fetch all product from backend
        result.forEach((post) => {
            const postElement = document.createElement("div");
            // ✅ Add classes to element
            postElement.classList.add("col-lg-4", "m-auto");
            postElement.innerHTML = `
            <img class="img-fluid w-100" src="img/product-1.jpg" alt="img" id="imgApi" />
            <div style="background-color: #3CB815;
            border-color: #3CB815;
            color: #fff;">
            <a class="d-block h5 pt-2 text-center text-white" href="#" id="text">${post.id}</a>
            <p id="title" class="part-food text-center border-top">${post.username}</p> 
            </div>
            `;
        recipes.appendChild(postElement);
        });
    });
});
