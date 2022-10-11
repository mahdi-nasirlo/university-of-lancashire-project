// menu-button
// function for toggle class "nwe class" in "mobileList" element
// run in = elemet with id : menuButton onclick="clickbtn()"
function clickbtn() {
  const mobileList = document.getElementById("mobileList");
  mobileList.classList.toggle("newClass");
}

// toggle show/hide password in iput password
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// nes sq
const CART = {
  KEY: "fdgsjl;kjadf",
  contents: [],
  //  initialize the contents
  init() {
    // check localStorage
    let _contents = localStorage.getItem(CART.KEY);
    if (_contents) {
      CART.contents = JSON.parse(_contents);
    } else {
      // test product - cart
      CART.contents = [
        // {
        //     id: "1",
        //     name: "UCLan Hoodie",
        //     color: "Purple",
        //     info: "cotton authentic character and practicality are combined in this comfy  warm and luxury hoodie for students that goes with everything to create casual looks",
        //     price: " Only £39.99",
        //     qty:1,
        //     image: "images/items/hoodies/hoodie (1).jpg",
        //     FIELD6: "['UCLan Hoodie','Purple','cotton authentic character and practicality are combined in this comfy  warm and luxury hoodie for students that goes with everything to create casual looks',' Only £39.99','images/items/hoodies/hoodie (1).jpg']"
        //   },
      ];
      CART.sync();
    }
  },
  async sync() {
    let _cart = JSON.stringify(CART.contents);
    await localStorage.setItem(CART.KEY, _cart);
    console.log(_cart);
  },
  find(id) {
    //find an item in the cart by it's id
    let match = CART.contents.filter((item) => {
      if (item.id == id) return true;
    });
    if (match && match[0]) return match[0];
  },
  add(object) {
    //add a new item to the cart
    //check that it is not in the cart already
    if (CART.find(object.id)) {
      CART.increase(object.id, 1);
    } else {
      let obj = {
        id: object.id,
        name: object.name,

        image: object.image,
        qty: 1,
        price: object.price,
        type: object.type,
      };
      CART.contents.push(obj);
      //update localStorage
      CART.sync();
    }
  },
  sort(field = "name") {
    //sort by field - name, price
    //return a sorted shallow copy of the CART.contents array
    let sorted = CART.contents.sort((a, b) => {
      if (a[field] > b[field]) {
        return 1;
      } else if (a[field] < a[field]) {
        return -1;
      } else {
        return 0;
      }
    });
    return sorted;
    //NO impact on localStorage
  },
};

// const CART = {

//   add(object) {
//     if (CART.find(object.id)) {
//       CART.increase(object.id, 1);
//     } else {
//       // let arr = PRODUCTS.filter((product) => {
//       //   if (product.id == id) {
//       //     return true;
//       //   }
//       // });
//       // if (arr && arr[0]) {
//         let obj = {
//           id: object.id,
//           name: object.name,
//           // color: arr[0].color,
//           // info: arr[0].info,
//           image: object.image,
//           qty: 1,
//           itemPrice: object.price,
//         };
//         CART.contents.push(obj);
//         //update localStorage
//         CART.sync();
//       // } else {
//         //product id does not exist in products data
//         // console.error("Invalid Product");
//       }
//     }
//   },
//   empty() {
//     //empty whole cart
//     CART.contents = [];
//     //update localStorage
//     CART.sync();
//   },

//   logContents(prefix) {
//     console.log(prefix, CART.contents);
//   },
// };

// // // cart products array
// let PRODUCTS = [];

document.addEventListener("DOMContentLoaded", () => {
  //when the page is ready
  // getProducts(showProducts, errorMessage);
  //get the cart items from localStorage
  CART.init();
  //cart page
  showCart();
});
// document.addEventListener("DOMContentLoaded", () => {
//   //item page
//   showItem();
// });

function showCart() {
  // if cart emty hide checkout btn
  let checkoutBtn = document.getElementById("checkoutBtn");
  if (checkoutBtn !== null) {
    checkoutBtn.style.display = CART.contents.length > 0 ? "" : "none";
  }

  let cartSection = document.getElementById("cConteainer");
  // cartSection.innerHTML = "";
  let Sort = CART.sort("qty");
  Sort.forEach((item) => {
    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");

    let div1 = document.createElement("div");
    let div2 = document.createElement("div");
    let div3 = document.createElement("div");
    td1.append(div1);
    td2.append(div2);
    td3.append(div3);
    tr.append(td1, td2, td3);

    let cartId = document.createElement("h5");
    cartId.textContent = item.id;
    div1.append(cartId);

    let cartItemImage = document.createElement("img");
    cartItemImage.src = item.image;
    cartItemImage.alt = item.name;
    div1.append(cartItemImage);

    let cartItemPrice = document.createElement("h4");
    cartItemPrice.textContent = item.price;
    div2.appendChild(cartItemPrice);

    let cartItemName = document.createElement("h4");
    cartItemName.textContent = item.name;
    div3.appendChild(cartItemName);

    let cartItemRemove = document.createElement("button");
    cartItemRemove.textContent = "Remove";
    div3.appendChild(cartItemRemove);

    cartId.className = "cart-item-id";
    cartItemImage.className = "cart-item-image";
    div1.classList = "cell-one";
    div2.classList = "cell-one";
    div3.classList = "cell-one";
    td3.style.textAlign = "right";
    cartItemName.className = "cart-item-name";
    cartItemRemove.className = "cart-item-remove-btn";
    cartItemPrice.className = "cart-item-price";

    // append
    cartSection.append(tr);
  });
}

function ShowCheckoutItem(cartSection) {
  let Sort = CART.sort("qty");
  Sort.forEach((item) => {
    //
    let cartItemContainer = document.createElement("div");
    let cartItem = document.createElement("div");
    cartItemContainer.appendChild(cartItem);

    let cartId = document.createElement("h5");
    cartId.textContent = item.id;
    cartItem.appendChild(cartId);

    let cartItemImage = document.createElement("img");
    cartItemImage.src = item.image;
    cartItemImage.alt = item.name;
    cartItem.appendChild(cartItemImage);

    let cartItemName = document.createElement("h4");
    cartItemName.textContent = item.name;
    cartItem.appendChild(cartItemName);

    let cartItemInfo = document.createElement("div");
    cartItemContainer.appendChild(cartItemInfo);

    let cartItemPrice = document.createElement("h4");
    cartItemPrice.textContent = item.price;
    cartItemInfo.appendChild(cartItemPrice);

    let cartItemType = document.createElement("h4");
    cartItemType.textContent = item.type;
    cartItemInfo.appendChild(cartItemType);

    // cart item styles
    cartItemContainer.classList = "cart-item-container checkout_item-container";
    cartItem.classList = "cart-item checkout_item";
    cartId.className = "cart-item-id";
    cartItemImage.className = "cart-item-image";
    cartItemName.className = "cart-item-name";
    cartItemInfo.className = "cart-item-info";
    cartItemPrice.className = "cart-item-price";
    cartItemType.style.marginRight = "10px";

    // append
    cartSection.appendChild(cartItemContainer);
  });
}

var totalPrice = 0;
function showCheckout() {
  // total price
  CART.contents.map((item) => {
    totalPrice += parseFloat(item.price);
  });

  let checkoutSection = document.getElementById("toggleCheckout");
  let main = document.createElement("div");
  let cartTitle = document.getElementById("cartTittle");
  let cartInfo = document.getElementById("cartInfo");
  let cartItem = document.getElementById("cartItem");

  // date
  var today = new Date();
  var date =
    today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();
  var time =
    today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var dateTime = date + " " + time;

  // user information
  const userInfo = {
    name: checkoutSection.getAttribute("username"),
    address: checkoutSection.getAttribute("useraddress"),
    email: checkoutSection.getAttribute("useremail"),
  };

  // hide cart elements
  cartInfo.style.display = "none";
  cartItem.style.display = "none";
  cartTitle.style.display = "none";

  // show profile details
  let profileTitle = document.createElement("h2");
  profileTitle.textContent = "Yout Details";
  checkoutSection.append(profileTitle);

  let dateDiv = document.createElement("div");
  let dateTitle = document.createElement("h4");
  dateTitle.textContent = "ORDER DATE";
  let dateInfo = document.createElement("h6");
  dateInfo.textContent = dateTime;
  dateDiv.append(dateTitle, dateInfo);
  main.append(dateDiv);

  let nameDiv = document.createElement("div");
  let nameTitle = document.createElement("h4");
  nameTitle.textContent = "NAME";
  let userName = document.createElement("h6");
  userName.textContent = userInfo.name;
  nameDiv.append(nameTitle, userName);
  main.append(nameDiv);

  let EmailDiv = document.createElement("div");
  let emailTilte = document.createElement("h4");
  emailTilte.textContent = "EMAIL";
  let userEmail = document.createElement("h6");
  userEmail.textContent = userInfo.email;
  EmailDiv.append(emailTilte, userEmail);
  main.append(EmailDiv);

  let address = document.createElement("div");
  let addressTittle = document.createElement("h4");
  addressTittle.textContent = "HOME ADDRESS";
  let userAddress = document.createElement("h6");
  userAddress.textContent = userInfo.address;
  address.append(addressTittle, userAddress);
  main.append(address);

  let delivery = document.createElement("div");
  let deliveryTittle = document.createElement("h4");
  deliveryTittle.textContent = "DELIVERY METHOD";
  let deliveryInfo = document.createElement("h6");
  deliveryInfo.textContent = "Standard Delivery";
  delivery.append(deliveryTittle, deliveryInfo);
  main.append(delivery);

  checkoutSection.append(main);

  // checkout datials
  let detail = document.createElement("div");
  let detailTitle = document.createElement("h2");
  detailTitle.textContent = "DETAIL";
  detail.append(detailTitle);

  let checkoutItem = document.createElement("div");
  let container = document.createElement("div");

  let containerItem = document.createElement("h4");
  containerItem.textContent = "Item";

  let containerProduct = document.createElement("h4");
  containerProduct.textContent = "Product";
  container.append(containerItem, containerProduct);
  checkoutItem.append(container);
  detail.append(checkoutItem);
  ShowCheckoutItem(detail);

  let _return = document.createElement("div");
  let total = document.createElement("h4");
  total.innerHTML = "<bold> TOTAL </bold>" + totalPrice;
  let returnBtn = document.createElement("button");
  returnBtn.textContent = "Confirm";
  _return.append(total, returnBtn);
  detail.append(_return);

  returnBtn.addEventListener("click", closeCheckout);

  checkoutSection.append(detail);

  // classs
  delivery.className = "profile-item";
  address.className = "profile-item";
  EmailDiv.className = "profile-item";
  nameDiv.className = "profile-item";
  dateDiv.className = "profile-item";
  profileTitle.className = "checkout-tittle";
  detailTitle.className = "checkout-tittle";
  main.className = "checkout-main";
  container.className = "cart-page-title-container";
  containerItem.className = "cart-page-item-title";
  containerProduct.className = "cart-page-item-title";
  _return.classList = "checkout-return";
}

function closeCheckout() {
  alert("");
  localStorage.setItem(CART.KEY, "[]");
  window.location.href = "/~szarei/";
}

function checkout() {
  alert("Your order has been successfuly placed");
  showCheckout();
}

// function getProducts(success, failure) {
//   // import products
//   const URL =
//     "https://shamimzr.github.io/Uclan-students-union-shop/newitems.json";
//   fetch(URL, {
//     method: "GET",
//     mode: "cors",
//   })
//     .then((response) => response.json())
//     .then(showProducts)
//     .catch((err) => {
//       errorMessage(err.message);
//     });
// }

// function showProducts(products) {
//   console.log(products);
//   PRODUCTS = products;
//   // nn start
//   let productsContainer = document.getElementById("product-container");
//   productsContainer.innerHTML = "";
//   // nn end

//   products.forEach((product) => {
//     let Product = document.createElement("div");
//     Product.setAttribute("id", product.name);
//     let ProductImageContainer = document.createElement("div");
//     Product.appendChild(ProductImageContainer);
//     let ProductImage = document.createElement("img");
//     ProductImage.alt = product.name;
//     ProductImage.src = product.image;
//     ProductImageContainer.appendChild(ProductImage);
//     let ProductInfoContaine = document.createElement("div");
//     Product.appendChild(ProductInfoContaine);
//     let ProductName = document.createElement("h4");
//     ProductName.textContent = product.name + " " + product.color;
//     ProductInfoContaine.appendChild(ProductName);
//     let ProductInfo = document.createElement("h5");
//     ProductInfo.textContent = product.info;
//     ProductInfoContaine.appendChild(ProductInfo);
//     let productReadmore = document.createElement("h5");
//     let AproductReadmore = document.createElement("a");
//     AproductReadmore.textContent = "read More";
//     AproductReadmore.href = "./item.php?id=27";
//     // set id of product to readmore attribute
//     AproductReadmore.setAttribute("data-id", product.id);
//     // set name of product to readmore attribute
//     AproductReadmore.setAttribute("data-name", product.name);
//     // set color of product to readmore attribute
//     AproductReadmore.setAttribute("data-color", product.color);
//     // set info of product to readmore attribute
//     AproductReadmore.setAttribute("data-info", product.info);
//     // set price of product to readmore attribute
//     AproductReadmore.setAttribute("data-price", product.price);
//     // set image of product to readmore attribute
//     AproductReadmore.setAttribute("data-image", product.image);
//     productReadmore.appendChild(AproductReadmore);
//     AproductReadmore.addEventListener("click", readMore);
//     ProductInfoContaine.appendChild(productReadmore);
//     let productPrice = document.createElement("h5");
//     productPrice.textContent = product.price;
//     ProductInfoContaine.appendChild(productPrice);
//     let productBuyButton = document.createElement("button");
//     productBuyButton.textContent = "Buy";
//     // set id of product to button attribute
//     productBuyButton.setAttribute("data-id", product.id);
//     productBuyButton.addEventListener("click", addItem);
//     ProductInfoContaine.appendChild(productBuyButton);

//     // add class to the elements
//     Product.className = "product";
//     ProductImageContainer.className = "product-image-container";
//     ProductImage.className = "product-image";
//     ProductInfoContaine.className = "product-info-container";
//     ProductName.className = "product-name";
//     ProductInfo.className = "product-info";
//     productReadmore.className = "product-readmore";
//     AproductReadmore.className = "product-readmore";
//     productPrice.className = "product-price";
//     productBuyButton.className = "product-buy-button";

//     // add product to productsContainer
//     productsContainer.appendChild(Product);
//   });
// }

// function showItem() {
//   let getItem = sessionStorage.getItem("product");
//   let Item = JSON.parse(getItem);

//   let itemSection = document.getElementById("itemSection");
//   itemSection.innerHTML = " ";

//   let mainItem = document.createElement("div");
//   let itemImageContainer = document.createElement("div");
//   mainItem.appendChild(itemImageContainer);
//   let itemImage = document.createElement("img");
//   itemImage.alt = Item.name;
//   itemImage.src = Item.image;
//   itemImageContainer.appendChild(itemImage);
//   let itemInfoContainer = document.createElement("div");
//   mainItem.appendChild(itemInfoContainer);
//   let itemName = document.createElement("h4");
//   itemName.textContent = Item.name + " " + Item.color;
//   itemInfoContainer.appendChild(itemName);
//   let itemInfo = document.createElement("h5");
//   itemInfo.textContent = Item.info;
//   itemInfoContainer.appendChild(itemInfo);
//   let itemPrice = document.createElement("h5");
//   itemPrice.textContent = Item.price;
//   itemInfoContainer.appendChild(itemPrice);
//   let itemBuyButton = document.createElement("button");
//   itemBuyButton.textContent = "Buy";
//   // set id of product to button attribute
//   itemBuyButton.setAttribute("data-id", Item.id);
//   itemBuyButton.addEventListener("click", addItem);
//   itemInfoContainer.appendChild(itemBuyButton);

//   //  add class to elemnts
//   mainItem.className = "item";
//   itemImageContainer.className = "item-image-container";
//   itemImage.className = "item-image";
//   itemInfoContainer.className = "item-info-container";
//   itemName.className = "item-name";
//   itemInfo.className = "item-info";
//   itemPrice.className = "item-price";
//   itemBuyButton.className = "item-buy-button button-one";

//   itemSection.appendChild(mainItem);
// }

function addItem(event) {
  event.preventDefault();
  let obj = {
    id: parseInt(event.target.getAttribute("data-id")),
    image: event.target.getAttribute("data-img"),
    name: event.target.getAttribute("data-name"),
    price: event.target.getAttribute("data-price"),
    type: event.target.getAttribute("data-type"),
  };
  console.log(obj);
  window.alert("Product added to the card");
  CART.add(obj, 1);
}

// // function readMore(ev) {
// //   let id = parseInt(ev.target.getAttribute("data-id"));
// //   let name = ev.target.getAttribute("data-name");
// //   let color = ev.target.getAttribute("data-color");
// //   let info = ev.target.getAttribute("data-info");
// //   let price = ev.target.getAttribute("data-price");
// //   let image = ev.target.getAttribute("data-image");

// //   const object = {
// //     id: id,
// //     name: name,
// //     color: color,
// //     info: info,
// //     price: price,
// //     image: image,
// //   };
// //   console.log(object);
// //   sessionStorage.setItem("product", JSON.stringify(object));
// // }

// function errorMessage(err) {
//   //display the error message to the user
//   console.error(err);
// }

var password = document.getElementById("password");
var comfirm = document.getElementById("confirm");

const showPasswordValidation = (pass) => {
  const valideateColor = (pattern) => {
    return pattern.test(pass) ? "green" : "red";
  };
  const validateIcon = (element, pattern, ms) => {
    let item = document.createElement("div");

    let trueOrFalseIcone = document.createElement("img");
    trueOrFalseIcone.src = pattern.test(pass)
      ? "./styles/green-check-mark-2-icon-17.png"
      : "./styles//multiplied by -1.png";

    let message = document.createElement("span");
    message.innerHTML = ms;

    item.className = "validate-itme";

    item.appendChild(trueOrFalseIcone);
    item.appendChild(message);
    element.appendChild(item);
  };

  let validationSection = document.getElementById("validation-pass");
  validationSection.innerHTML = "";
  validationSection.className = "validation-pass";

  let main = document.createElement("div");
  main.innerHTML = "";

  let title = document.createElement("h3");
  title.textContent = "Password must contain the following:";
  main.appendChild(title);

  let lowerCase = document.createElement("div");
  validateIcon(lowerCase, /.*[a-z].*/, "A <strong>lowercase</strong> letter");
  lowerCase.style.color = valideateColor(/.*[a-z].*/);
  main.appendChild(lowerCase);

  let captalCase = document.createElement("div");
  validateIcon(
    captalCase,
    /([A-Z])/,
    "A <strong>capital (uppercase)</strong> letter"
  );
  captalCase.style.color = valideateColor(/([A-Z])/);
  main.appendChild(captalCase);

  let number = document.createElement("div");
  validateIcon(number, /.*[0-9].*/, "A <strong>number</strong>");
  number.style.color = valideateColor(/.*[0-9].*/);
  main.appendChild(number);

  let count = document.createElement("div");
  validateIcon(count, /^[\w\W]{8,}$/, "Minimum <strong>8 characters</strong>");
  count.style.color = valideateColor(/^[\w\W]{8,}$/);
  main.appendChild(count);

  validationSection.appendChild(main);
};

const isValidPass = (pass) => {
  if (
    /.*[a-z].*/.test(pass) &&
    /.*[A-Z].*/.test(pass) &&
    /.*[0-9].*/.test(pass) &&
    /^[\w\W]{8,}$/.test(pass)
  ) {
    return true;
  } else return false;
};

const validateComfirm = () => {
  if (isValidPass(password.value)) {
    // check password is comfirm or not
    password.setCustomValidity("");
    if (password.value !== comfirm.value) {
      comfirm.style.border = "1px solid red";
      comfirm.setCustomValidity("Passwords Don't Match");
    } else {
      comfirm.style.border = "1px solid black";
      comfirm.setCustomValidity("");
    }
  } else {
    // set invalide password
    password.setCustomValidity("Passwords Don't valid");
  }
};

if (comfirm && password) {
  // check confirm and validate password
  comfirm.addEventListener("keyup", validateComfirm);
  password.addEventListener("keyup", () => {
    // check confirm password and valide password
    validateComfirm();
    // show validation section
    showPasswordValidation(password.value);
  });

  password.addEventListener("blur", () => {
    // clear validation section
    let validationSection = document.getElementById("validation-pass");
    validationSection.innerHTML = "";
    validationSection.className = "";
  });
}

// toggel show/hide passwprd
var toggler = document.getElementById("eye");
var inputPassword = document.getElementById("password");

if (toggler && inputPassword) {
  // toggle show/hide password
  toggler.addEventListener("click", () => {
    if (password.type == "password") {
      password.setAttribute("type", "text");
    } else {
      password.setAttribute("type", "password");
    }
  });

  // hide show/hide password icon
  inputPassword.addEventListener("focus", () => {
    toggler.style.cursor = "pointer";
    document.getElementById("eye-img").style.display = "block";
  });

  // show show/hide password icon
  inputPassword.addEventListener("blur", () => {
    toggler.style.cursor = "text";
    document.getElementById("eye-img").style.display = "none";
  });
}
