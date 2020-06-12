function isAuthentecated() {
   return localStorage.getItem('usertoken')===true?true:false;
}
function isUser() {
    return localStorage.getItem('Usertoken')===true?true:false;
 }

function login(user,token) {
    if(user){
        localStorage.setItem('token',token);
        localStorage.setItem('user',user);
    }
}

function logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
}

module.exports={isAuthentecated,login,logout,isUser};