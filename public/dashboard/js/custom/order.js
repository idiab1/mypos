// Select on product add button
const productAddBtns = document.querySelectorAll(".btn-product-add");
productAddBtns.forEach(productAddBtn => {
    productAddBtn.addEventListener("click", (e) =>{
        e.preventDefault();

        // Select on data name of product add button
        let name = productAddBtn.getAttribute("data-name")
        // Select on id of product add button
        let id = productAddBtn.getAttribute("data-id")
        // Select on data price of product add button
        let price = productAddBtn.getAttribute("data-price")
        // Select on order list element
        const orderList = document.querySelector(".order-list")

        let row =
        `<tr>
            <td>${name}</td>
            <td><input class="form-control" type="number" name="products[]" data-price="${price}" value="1" min="1"></td>
            <td>${price}</td>
            <td>
                <button class="btn btn-danger btn-sm btn-product-remove" href="#" data-id="${id}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>`;

        productAddBtn.classList.remove("btn-primary")
        productAddBtn.classList.add("btn-default")
        productAddBtn.classList.add("disabled")

        // Append row element to order list
        orderList.insertAdjacentHTML("beforeend", row)

        // let productRemoveBtns = document.querySelectorAll(".order-list .btn-product-remove");
        // console.log(productRemoveBtns)
    })
})

document.querySelector("body").addEventListener("click", e =>{
    console.log(e.currentTarget)

})
