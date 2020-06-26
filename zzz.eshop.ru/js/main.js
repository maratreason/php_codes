var cart = {} // Корзина

function init() {
  // Вычитываем файл goods.json
  // $.getJSON("goods.json", goodsOut)
  $.post(
    "admin/core.php",
    {
      action: "loadGoods"
    },
    goodsOut
  )
}

function goodsOut(data) {
  // Вывод на страницу
  data = JSON.parse(data)
  var out = ""
  for (var key in data) {
    out += `
    <div class="cart">
      <p class="name">${data[key].name}</p>
      <img src="images/${data[key].img}" alt="" />
      <div class="cost">${data[key].cost}</div>
      <button class="add-to-cart" data-id="${key}">Купить</button>
    </div>
    `
  }

  $(".goods-out").html(out)
  $(".add-to-cart").on("click", addToCart)
}

function addToCart() {
  // Добавляем товар в корзину
  var id = $(this).attr("data-id")
  console.log(id)
  if (cart[id] == undefined) {
    cart[id] = 1 // если в корзине нет товара с этим id
  } else {
    cart[id]++ // если такой товар есть, то увеличиваем на 1
  }
  console.log(cart)
  showMiniCart()
  saveCart()
}

function saveCart() {
  // сохраняю корзину в localstorage
  localStorage.setItem("cart", JSON.stringify(cart))
}

function loadCart() {
  // Достаем данные из localstorage
  if (localStorage.getItem("cart")) {
    cart = JSON.parse(localStorage.getItem("cart"))
    showMiniCart()
  }
}

function showMiniCart() {
  // Показываю мини корзину
  var out = ""
  for (var key in cart) {
    out += key + " --- " + cart[key] + "<br>"
  }
  $(".mini-cart").html(out)
}

$(document).ready(function() {
  init()
  loadCart()
})
