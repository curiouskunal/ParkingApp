function errorMessage(){
    setTimeout(() => {document.querySelectorAll("p.center.msgBanner").forEach((tmp) => {tmp.parentElement.removeChild(tmp)})}, 3000)
}
