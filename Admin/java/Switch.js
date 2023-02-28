function opentab(tabID1,tabID2) 
{
    var tabselectclose = document.getElementById(tabID1);
    var tabselectopen = document.getElementById(tabID2);
    tabselectclose.style.display = 'none';
    tabselectopen.style.display ="";
}
function openviewbox(tabID,btnID)
{
    var tabopen = document.getElementById(tabID);
    var usingbtn = document.getElementById(btnID);
    usingbtn.style.backgroundColor = "salmon";
    tabopen.style.display ="";
    usingbtn = document.getElementById(btnID).id = "close-list-btn";
    document.getElementById("close-list-btn").onmouseover = function() {changebgclose()};
    document.getElementById("close-list-btn").onmouseout = function() {returnbgclose()};
    document.getElementById("close-list-btn").onclick = function() {closeviewbox(tabID,'close-list-btn')};
}
function closeviewbox(tabID,btnID)
{
    var tabclose = document.getElementById(tabID);
    var returnbtn = document.getElementById(btnID);
    returnbtn.style.backgroundColor = "green";
    tabclose.style.display ="none";
    returnbtn = document.getElementById(btnID).id = "view-list-btn";
    document.getElementById("view-list-btn").onmouseover = function() {changebgopen()};
    document.getElementById("view-list-btn").onmouseout = function() {returnbgopen()};
    document.getElementById("view-list-btn").onclick = function() {openviewbox(tabID,'view-list-btn')};
}
function changebgclose() {
    document.getElementById("close-list-btn").style.backgroundColor = "red";
}
function returnbgclose() {
    document.getElementById("close-list-btn").style.backgroundColor = "salmon";
}
function changebgopen() {
    document.getElementById("view-list-btn").style.backgroundColor = "yellowgreen";
}
function returnbgopen() {
    document.getElementById("view-list-btn").style.backgroundColor = "green";
}