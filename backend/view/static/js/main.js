"use strict";var visibilityElems,inputSearch,inputSearchList,inputSearchItem,inputSearchBlock=document.querySelector(".input-search__block");inputSearchBlock&&(visibilityElems=function(e){inputSearchItem.forEach(function(t){if(!t.querySelector("label").textContent.trim().toLocaleLowerCase().includes(e.trim().toLocaleLowerCase()))return t.classList.add("d-none");t.classList.contains("d-none")&&t.classList.remove("d-none")})},inputSearch=inputSearchBlock.querySelector(".input-search"),inputSearchList=inputSearchBlock.querySelector(".input-search__list"),inputSearchItem=inputSearchBlock.querySelectorAll(".input-search__item"),inputSearch.onclick=function(){inputSearchList.classList.add("d-flex")},inputSearch.oninput=function(t){inputSearchList.classList.add("d-flex"),visibilityElems(t.target.value)},inputSearch.onblur=function(){setTimeout(function(){inputSearchList.classList.contains("d-flex")&&inputSearchList.classList.remove("d-flex")},250)},inputSearchItem.forEach(function(t){t.onclick=function(){inputSearch.value=t.textContent.trim(),inputSearchList.classList.contains("d-flex")&&inputSearchList.classList.remove("d-flex")}}));