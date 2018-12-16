#include<stdio.h>
int main() {
    int n ;
    int counter = 1;
    scanf("%d",&n);
    while(n != 1){
        if (n % 2 != 0){
            n = 3 * n + 1;
        }
        else {
            n = n / 2;
        }
        counter = counter + 1;
    }
    printf("%d",counter);
    return 0;
}