var cart = {}

function loadCart() {
  // Достаем данные из localstorage
  if (localStorage.getItem("cart")) {
    cart = JSON.parse(localStorage.getItem("cart"))
    showCart()
  } else {
    $(".main-cart").html("Корзина пуста")
  }
}

function showCart() {
  // Вывод корзины
  if (!isEmpty(cart)) {
    $(".main-cart").html("Корзина пуста")
  } else {
    $.getJSON("goods.json", function(data) {
      var goods = data
      var out = ""
      for (var id in cart) {
        out += `
        <img src="images/${goods[id].img}" alt=""/>
        <button data-id="${id}" class="del-goods">x</button>
          <div>Название: ${goods[id].name}</div>
          <div class="flex-buttons">
            <button data-id="${id}" class="minus-goods">-</button>
            <span>Количество: ${cart[id]}</span><br>
            <button data-id="${id}" class="plus-goods">+</button>
          </div>
          <hr/>
          <div>Цена: ${(cart[id] * goods[id].cost).toFixed(2)}</div>
        `
      }
      $(".main-cart").html(out)
      $(".del-goods").on("click", delGoods)
      $(".plus-goods").on("click", plusGoods)
      $(".minus-goods").on("click", minusGoods)
    })
  }
}

function delGoods() {
  // Удаляем товар из корзины
  var id = $(this).attr("data-id")
  delete cart[id]
  saveCart()
  showCart()
}

function plusGoods() {
  // Добавляем товар из корзины
  var id = $(this).attr("data-id")
  cart[id]++
  saveCart()
  showCart()
}

function minusGoods() {
  // Добавляем товар из корзины
  var id = $(this).attr("data-id")
  if (cart[id] == 1) {
    delete cart[id]
  } else {
    cart[id]--
  }
  saveCart()
  showCart()
}

function saveCart() {
  // сохраняю корзину в localstorage
  localStorage.setItem("cart", JSON.stringify(cart))
}

function isEmpty(object) {
  // проверка корзины на пустоту
  for (var key in object) {
    if (object.hasOwnProperty(key)) return true
  }
  return false
}

function sendEmail() {
  var name = $("#name").val()
  var email = $("#email").val()
  var phone = $("#phone").val()

  if (name !== "" && email !== "" && phone !== "") {
    if (isEmpty(cart)) {
      $.post(
        "core/mail.php",
        {
          name: name,
          email: email,
          phone: phone,
          cart: cart
        },
        function(data) {
          console.log(data)
        }
      )
    } else {
      alert("Корзина пуста")
    }
  } else {
    alert("Заполните все поля")
  }
}

$(document).ready(function() {
  loadCart()
  $(".send-email").on("click", sendEmail) // Отправить письмо с заказом
})
