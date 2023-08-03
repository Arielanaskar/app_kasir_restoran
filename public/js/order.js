const Addtocart = document.querySelectorAll('.AddtoCart');
const Removetocart = document.querySelectorAll('.RemovetoCart');

const menu_item_cart = document.querySelectorAll('.menu-item-cart')
const cartProduct = document.querySelectorAll('.cart-product');
const nameProduct = document.querySelectorAll('.product h5');
const priceProduct = document.querySelectorAll('.product h6');
let list_Product = [];

const qty_numbers = document.querySelectorAll('.qty-numbers');
const menu_order = document.querySelector('.menu-order');
const clear_order = document.querySelector('.clear-order');
let arr = []; 

let total_price = 0; 
let fixed_price = 0;
const subtotal = document.querySelector('.cart-payment .sub-total');
const total_transaction = document.querySelector('.cart-payment .total-transaction ');
const input_transaction = document.querySelector('.section-transaction input');
const menu_id = document.getElementById('menu_id');

const table = document.querySelectorAll('.tab-container');
let table_selected = [];
let table_click = [];


Addtocart.forEach((e, i) => {
    e.addEventListener('click', () => {
        let valueQty = parseInt(qty_numbers[i].innerText);
        let qty = 0;
        qty = valueQty + 1;
        qty_numbers[i].innerText = qty;
        let idProduct = menu_item_cart[i].getAttribute('data-id');
        if (!arr.includes(i)) {
            arr.push(i);
            list_Product.push({'menu_id' : idProduct, 'qty' : qty, 'price' : parseInt(priceProduct[i].innerText.split(".").join('')) });
            menu_order.innerHTML += 
            `<div class="cart-product d-flex flex-column rounded mb-4" data-cart="${i}" data-id="">
                <div class="product-order">
                    <h5 class="text-white ms-4 mt-3" style="font-size: 18px;">${nameProduct[i].innerText}</h5>
                    <h6 class="text-white ms-4 mb-3" style="font-size: 12px;">${priceProduct[i].innerText}</h6>
                </div>
                <div class="qty d-flex justify-content-between w-25 ms-4 mb-3">
                    <i onclick="remove(this)" class="btn-remove-inner fa-solid fa-minus" style="color: #fff;"></i>
                    <div class="qty-numbers text-white me-2 ms-2">
                        1
                    </div>
                    <i onclick="add(this)" class="btn-add-inner fa-solid fa-plus" style="color: #fff;"></i>
                </div>
            </div>`;
        }else {
            list_Product.find(product => product.menu_id == idProduct).qty = qty;
            list_Product.find(product => product.menu_id == idProduct).price = parseInt(priceProduct[i].innerText.split(".").join('')) * qty;
            document.querySelector(`[data-cart='${i}']`).innerHTML = 
            ` <div class="product-order">
                    <h5 class="text-white ms-4 mt-3" style="font-size: 18px;">${nameProduct[i].innerText}</h5>
                    <h6 class="text-white ms-4 mb-3" style="font-size: 12px;">${priceProduct[i].innerText}</h6>
                </div>
                <div class="qty d-flex justify-content-between w-25 ms-4 mb-3">
                    <i onclick="remove(this)" class="btn-remove-inner fa-solid fa-minus" style="color: #fff;"></i>
                    <div class="qty-numbers text-white me-2 ms-2">
                        ${qty}
                    </div>
                    <i onclick="add(this)" class="btn-add-inner fa-solid fa-plus" style="color: #fff;"></i>
                </div>`
        }
        total_price += parseInt(priceProduct[i].innerText.split(".").join(''));
        fixed_price = total_price + (total_price * 10 / 100);
        subtotal.innerText = `Rp ${formatRupiah(total_price.toString())}`;
        total_transaction.innerText = `Rp ${formatRupiah(fixed_price.toString())}`;
        input_transaction.value = fixed_price;
        menu_id.value = JSON.stringify(list_Product);
    })
});

Removetocart.forEach((e, i) => {
    e.addEventListener('click', () => {
        let valueQty = parseInt(qty_numbers[i].innerText);
        let qty = 0;
        let idProduct = menu_item_cart[i].getAttribute('data-id');
        if (arr.includes(i)) {
            if (valueQty <= 1) {
                qty = 0;
                let element = document.querySelector(`[data-cart='${i}']`);
                menu_order.removeChild(element);
                arr.splice(arr.indexOf(i),1);
                total_price -= parseInt(priceProduct[i].innerText.split(".").join(''));
                fixed_price = total_price + (total_price * 10) / 100;
                list_Product.splice(list_Product.indexOf(list_Product.find((product) => product.menu_id == idProduct)), 1);
            }else {
                qty = valueQty - 1;
                document.querySelector(`[data-cart='${i}']`).innerHTML = 
                ` <div class="product-order">
                        <h5 class="text-white ms-4 mt-3" style="font-size: 18px;">${nameProduct[i].innerText}</h5>
                        <h6 class="text-white ms-4 mb-3" style="font-size: 12px;">${priceProduct[i].innerText}</h6>
                    </div>
                    <div class="qty d-flex justify-content-between w-25 ms-4 mb-3">
                        <i onclick="remove(this)" class="btn-remove-inner fa-solid fa-minus" style="color: #fff;"></i>
                        <div class="qty-numbers text-white me-2 ms-2">
                            ${qty}
                        </div>
                        <i onclick="add(this)" class="btn-add-inner fa-solid fa-plus" style="color: #fff;"></i>
                    </div>`
                total_price -= parseInt(priceProduct[i].innerText.split(".").join(''));
                fixed_price = total_price + (total_price * 10) / 100;
                list_Product.find(product => product.menu_id == idProduct).qty = qty;
                list_Product.find(product => product.menu_id == idProduct).price -= parseInt(priceProduct[i].innerText.split(".").join(''));
            }
            qty_numbers[i].innerText = qty;
            menu_id.value = JSON.stringify(list_Product);
        }
        subtotal.innerText = `Rp ${formatRupiah(total_price.toString())}`;
        total_transaction.innerText = `Rp ${formatRupiah(fixed_price.toString())}`;
        if (fixed_price === 0) {
            input_transaction.removeAttribute('value');
        } else {
            input_transaction.value = fixed_price;
        }
    })
})

let list_table = Array.from(table);
for (let i = 0; i < tables.length; i++) {
    let type_tables = list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).getAttribute('class');
    list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).setAttribute('data-table', 'sold');
    list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(1).style.color = "#fff";
    if (type_tables == "table-A") {
        list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).src = "../images/table/sold/meja4-sold.png";
    } else if(type_tables == "table-B") {
        list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).src = "../images/table/sold/meja5-sold.png";
    } else if(type_tables == "table-C1") {
        list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).src = "../images/table/sold/meja1-sold.png";
    } else if(type_tables == "table-C2") {
        list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).src = "../images/table/sold/mejabottom-sold.png";
    } else if(type_tables == "table-D") {
        list_table.find(b => b.children.item(0).getAttribute("data-number") == tables[i].no_table).children.item(0).src = "../images/table/sold/meja3-sold.png";
    } 
}

table.forEach((e, i) => {
    e.addEventListener("click", function () {
        let type = e.children.item(0).getAttribute("class");
        let tbl_img = table[i].children.item(0);
        let tbl_num = tbl_img.getAttribute("data-number");
        let ifselected = tbl_img.getAttribute("data-table");
        let text = e.children.item(1);
       
        if (type == "table-A") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja4.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else if(ifselected == "not-selected") {
                tbl_img.src = "../images/table/selected/meja4-selected.png";
                tbl_img.setAttribute("data-table", "selected");
                text.style.color = "#fff";
            } else {
                return false;
            }
        } else if (type == "table-B") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja5.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else if(ifselected == "not-selected") {
                tbl_img.src = "../images/table/selected/meja5-selected.png";
                tbl_img.setAttribute("data-table", "selected");
                text.style.color = "#fff";
            } else {
                return false;
            }
        } else if (type == "table-C1") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja0.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else if(ifselected == "not-selected") {
                tbl_img.src = "../images/table/selected/meja1.png";
                tbl_img.setAttribute("data-table", "selected");
                text.style.color = "#fff";
            } else {
                return false;
            }
        } else if (type == "table-C2") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/mejabottom.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else if(ifselected == "not-selected") {
                tbl_img.src = "../images/table/selected/mejabottom-selected.png";
                tbl_img.setAttribute("data-table", "selected");
                text.style.color = "#fff";
            } else {
                return false;
            }
        } else if (type == "table-D") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja3.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else if(ifselected == "not-selected") {
                tbl_img.src = "../images/table/selected/meja3-selected.png";
                tbl_img.setAttribute("data-table", "selected");
                text.style.color = "#fff";
            } else {
                return false
            }
        }

        if (table_selected.includes(tbl_num)) {
            table_selected.splice(table_selected.indexOf(`${tbl_num}`), 1);
        } else {
            table_selected.push(tbl_num);
        }
        document.getElementById("table_selected").value = table_selected;
        document.querySelector(".tables-selected").innerText = `Table ${table_selected}`
    });
});

function deleteOrder() {
    qty_numbers.forEach((e,i) => {
        e.innerText = '0';
    });
    menu_order.innerHTML = '';
    list_Product = [];
    arr = [];
    total_price = 0;
    fixed_price = 0;
    subtotal.innerText = 'Rp 0';
    total_transaction.innerText = 'Rp 0';
    input_transaction.removeAttribute('value')
    menu_id.removeAttribute('value')
    document.getElementById("table_selected").value = ' ';
    document.querySelector(".tables-selected").innerText = `Table `;
    table_selected.removeAttribute('value');
    table.forEach((e, i) => {
        let type = e.children.item(0).getAttribute("class");
        let tbl_img = table[i].children.item(0);
        let text = e.children.item(1);
        let ifselected = tbl_img.getAttribute("data-table");
        if (type == "table-A") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja4.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            }else {
                return false;
            }
        } else if (type == "table-B") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja5.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            }else {
                return false;
            }
        } else if (type == "table-C1") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja0.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            }else {
                return false;
            }
        } else if (type == "table-C2") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/mejabottom.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            } else {
                return false;
            }
        } else if (type == "table-D") {
            if (ifselected == "selected") {
                tbl_img.src = "../images/table/meja3.png";
                tbl_img.setAttribute("data-table", "not-selected");
                text.style.color = "#000";
            }else {
                return false;
            }
        }
    })
}

function add(e) {
    let qty_numbers_inner = e.parentElement.parentElement.children[1].children[1];
    let qty_numbers_outers = Addtocart[e.parentElement.parentElement.getAttribute('data-cart')].parentElement.children[1];
    let price_outers = parseInt(priceProduct[e.parentElement.parentElement.getAttribute('data-cart')].innerText.split(".").join(''));
    let list_menu_id = menu_item_cart[e.parentElement.parentElement.getAttribute('data-cart')].getAttribute('data-id');
    let number_count = parseInt(qty_numbers_outers.innerText) + 1;
    
    list_Product.find(product => product.menu_id == list_menu_id).qty = number_count;
    list_Product.find(product => product.menu_id == list_menu_id).price = price_outers * number_count;
    
    qty_numbers_inner.innerText = number_count;
    qty_numbers_outers.innerText = number_count;
    
    total_price += price_outers;
    fixed_price = total_price + (total_price * 10 / 100);
    subtotal.innerText = `Rp ${formatRupiah(total_price.toString())}`;
    total_transaction.innerText = `Rp ${formatRupiah(fixed_price.toString())}`;
    input_transaction.value = fixed_price;
    menu_id.value = JSON.stringify(list_Product);

}

function remove(e) {
    let qty_numbers_inner = e.parentElement.parentElement.children[1].children[1];
    let qty_numbers_outers = Addtocart[e.parentElement.parentElement.getAttribute('data-cart')].parentElement.children[1];
    let price_outers = parseInt(priceProduct[e.parentElement.parentElement.getAttribute('data-cart')].innerText.split(".").join(''));
    let list_menu_id = menu_item_cart[e.parentElement.parentElement.getAttribute('data-cart')].getAttribute('data-id');
    let number_count = parseInt(qty_numbers_outers.innerText) - 1;

    if (number_count < 1) {
        list_Product.splice(list_Product.indexOf(list_Product.find((product) => product.menu_id == list_menu_id)), 1);
        menu_order.removeChild(e.parentElement.parentElement);
        qty_numbers_outers.innerText = number_count;
        total_price -= price_outers;
        fixed_price = total_price + (total_price * 10 / 100);
    } else {
        qty_numbers_inner.innerText = number_count;
        qty_numbers_outers.innerText = number_count;
        list_Product.find(product => product.menu_id == list_menu_id).qty = number_count;
        list_Product.find(product => product.menu_id == list_menu_id).price = price_outers * number_count;
        total_price -= price_outers;
        fixed_price = total_price + (total_price * 10 / 100);
    }    

    subtotal.innerText = `Rp ${formatRupiah(total_price.toString())}`;
    total_transaction.innerText = `Rp ${formatRupiah(fixed_price.toString())}`;
    menu_id.value = JSON.stringify(list_Product);
    if (fixed_price === 0) {
        input_transaction.removeAttribute('value');
    } else {
        input_transaction.value = fixed_price;
    }
}