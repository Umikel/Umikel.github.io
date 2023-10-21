function nota(n){
    if(n==0){
        return 1;
    }
        else{ 
           return nota(n-1)*n;
        }
    }
console.log(nota(5));