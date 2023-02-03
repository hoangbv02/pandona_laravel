const sortE = document.getElementById("sort");
const priceItems = document.querySelectorAll(".sidebar__form-input");
const fitems = document.querySelectorAll(".sidebar__input-type");
var price = "0:999999999999";
var type = "";
function removeChecked(e) {
    for (let i = 0; i < e.length; i++) {
        if (e[i].checked) {
            e[i].checked = false;
        }
    }
}
window.onload = function () {
    $("#ctproduct").load(`/product-list?price=${price}&type=${type}`);
};
sortE.onchange = function () {
    const sort_by = this.value;
    if (sort_by) {
        $("#ctproduct").load("/product-list?sort=" + sort_by);
        priceItems.forEach(function (item, i) {
            if (i === 0) {
                item.checked = true;
            } else {
                item.checked = false;
            }
        });
        fitems.forEach(function (item) {
            item.checked = false;
        });
    }
};

priceItems.forEach(function (item) {
    item.onchange = function (e) {
        if (e.target.checked) {
            price = e.target.value;
            removeChecked(priceItems);
            e.target.checked = true;
            $("#ctproduct").load(`/product-list?price=${price}&type=${type}`);
        } else {
            e.target.checked = true;
        }
    };
});
fitems.forEach(function (item) {
    item.onchange = function (e) {
        if (e.target.checked) {
            type = e.target.value;
            removeChecked(fitems);
            e.target.checked = true;
            $("#ctproduct").load(`/product-list?price=${price}&type=${type}`);
        } else {
            type = "";
            $("#ctproduct").load(`/product-list?price=${price}&type=${type}`);
        }
    };
});
if(getType){
    fitems.forEach(function (item) {
        if (item.value == getType) {
            item.checked = true;
        }
    });
    window.onload = function () {
        $("#ctproduct").load(`/product-list?price=${price}&type=${getType}`);
    };
}
