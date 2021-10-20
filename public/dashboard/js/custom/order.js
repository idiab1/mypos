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
            <td><input class="form-control product-quantity" type="number" name="products[${id}][quantity]" data-price="${price}" value="1" min="1"></td>
            <td class="product-price">${price}</td>
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

        // Select on product remove button
        let productRemoveBtns = document.querySelectorAll(".order-list .btn-product-remove");

        productRemoveBtns.forEach(productRemoveBtn => {
            // remvoe row when click
            productRemoveBtn.addEventListener("click", (e) => {

                // Select on data id of product add button
                let id = productRemoveBtn.getAttribute("data-id")

                let product = document.querySelector("#product-" + id)
                // Remove product from order list
                productRemoveBtn.parentElement.parentElement.remove()

                product.classList.remove("btn-default")
                product.classList.remove("disabled")
                product.classList.add("btn-primary")

                totalPrice()
            })
        })

        // Calculate price for product
        let productsQty = document.querySelectorAll(".product-quantity")
        productsQty.forEach(productQty => {

            productQty.addEventListener("change", () => {

                let price = productQty.value * productQty.getAttribute("data-price")

                let productPrice = productQty.parentElement.nextElementSibling;

                productPrice.textContent = price

                totalPrice()


            })
        })

        totalPrice()

    })
})

// Calculate total price for orders list
function totalPrice(){

    let price = 0;

    // Select on all products
    let productsPrice = document.querySelectorAll(".order-list .product-price");

    productsPrice.forEach(productPrice => {
        // change data type for productPrice
        price += Number(productPrice.textContent)
    })

    // Select on total price element
    let totalPrice = document.querySelector(".total-price .total");

    totalPrice.textContent = price

    if(price > 0){
        document.querySelector(".btn-add-order").classList.remove("disabled")
    }else{
        document.querySelector(".btn-add-order").classList.add("disabled")
    }
}




