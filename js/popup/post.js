function createXhr(){
        var xhr = null;
        if(window.XMLHttpRequest){
            xhr = new XMLHttpRequest();//谷歌、火狐等浏览器
        }else if(window.ActiveXObject){
            xhr = new ActiveXObject("Microsoft.XMLHTTP");//ie低版本
        }
        return xhr;
    }
    //注册方法
    function reg(){
        //1、获取准备Post内容
        var username = document.getElementsByName('username')[0].value;
        var email = document.getElementsByName('email')[0].value;
        //2、创建XMLHttpRequest对象
        var xhr = createXhr();
        //3、确定请求参数
        xhr.open('POST','./post.php',true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        //4、重写回调函数
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //使用服务器端返回值
                var regres = document.getElementById('regres');
                regres.innerHTML = this.responseText;
            }
        }
        //5、发送请求
        var content = 'username='+username+'&email='+email;
        xhr.send(content);

        return false;//不跳转页面
    }