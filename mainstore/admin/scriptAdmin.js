let user = document.getElementById('user');
let history = document.getElementById('history');
let product = document.getElementById('product');
let gametopup = document.getElementById('gametopup');
let userTable = document.getElementById('userTable');
let historyTable = document.getElementById('historyTable');
let productTable = document.getElementById('productTable');
let gametopuptable = document.getElementById('gametopuptable');

let productAbtn = document.getElementById('productAbtn');
let productGbtn = document.getElementById('productGbtn');
let productTbtn = document.getElementById('productTbtn');
let productALL = document.getElementById('productALL');
let productGame = document.getElementById('productGame');
let productTop = document.getElementById('productTop');

let historyA = document.getElementById('historyA');
let historyG = document.getElementById('historyG');
let historyT = document.getElementById('historyT');
let historyAll = document.getElementById('historyAll');
let historyGame = document.getElementById('historyGame');
let historyTop = document.getElementById('historyTop');


    user.addEventListener('click', function() {
        userTable.style.display = 'block';
        historyTable.style.display = 'none';
        productTable.style.display = 'none';
        gametopuptable.style.display = 'none';
    });

    history.addEventListener('click', function() {
        userTable.style.display = 'none';
        historyTable.style.display = 'block';
        productTable.style.display = 'none';
        gametopuptable.style.display = 'none';
    });

    product.addEventListener('click', function() {
        userTable.style.display = 'none';
        historyTable.style.display = 'none';
        productTable.style.display = 'block';
        gametopuptable.style.display = 'none';
    });

    gametopup.addEventListener('click', function() {
        userTable.style.display = 'none';
        historyTable.style.display = 'none';
        productTable.style.display = 'none';
        gametopuptable.style.display = 'block';
    });


            productAbtn.addEventListener('click', function() {
                productALL.style.display = 'block';
                productGame.style.display = 'none';
                productTop.style.display = 'none';
            });

            productGbtn.addEventListener('click', function() {
                productALL.style.display = 'none';
                productGame.style.display = 'block';
                productTop.style.display = 'none';
            });

            productTbtn.addEventListener('click', function() {
                productALL.style.display = 'none';
                productGame.style.display = 'none';
                productTop.style.display = 'block';
            });


    historyA.addEventListener('click', function() {
        historyAll.style.display = 'block';
        historyGame.style.display = 'none';
        historyTop.style.display = 'none';
    });

    historyG.addEventListener('click', function() {
        historyAll.style.display = 'none';
        historyGame.style.display = 'block';
        historyTop.style.display = 'none';
    });

    historyT.addEventListener('click', function() {
        historyAll.style.display = 'none';
        historyGame.style.display = 'none';
        historyTop.style.display = 'block';
    });