class App {
    constructor() {
        this.popupCLick();
        this.pChange();
        this.thumbsBtnClick();
    }
    
    popupCLick() {
        let flag=false;
        let user=document.querySelector(".user");
        user.addEventListener("click",(e)=> {
            if(flag) {
                flag= false;
                $("#user-popup").animate({
                    opacity:0
                },500);
            }else {
                flag= true;
                $("#user-popup").animate({
                    opacity:1
                },500);
            }
        });
    }

    thumbsBtnClick() {
        let btn = document.querySelector("#thumbs");
        const url = document.location.href;
        const id = url.split("id=")[1];

        btn.addEventListener("click",()=> {
                $.ajax({
                    url:'/thumbs',
                    method:'POST',
                    data:$('form').serialize(),
                    success: (e) => {
                        if(e=="성공") {
                            location.reload();
                        }
                        else if( e=="실패") window.alertBox('오류 발생');
                    }
                });
            })
    }

    pChange() {
        let btn = document.querySelector("#pChange");
        btn.addEventListener("click",e=> {
            document.querySelector('#profile-popup').style.display="flex";
        });
        document.querySelector("#close").addEventListener("click",e=> {
            document.querySelector('#profile-popup').style.display="none";
        })
    }
}

window.onload=()=> {
    window.app = new App;
}
