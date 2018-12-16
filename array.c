/*
* File Name : Array.c
* ID : 105213065
* Author : 林則勇
*/
#include<stdio.h>
int isPrime(int n){//宣告isPrime这个函数寻找质数
    int i;
    int counter = 0;//宣告一个记数器
    for (i = 1; i <= n ; i++){
        if (n % i == 0){
            counter = counter + 1;//当因数时+1
        }
    }
    if(counter == 2){
        return 1;
    }
    return 0;
}
int main() {
    int  i, x;//宣告变数
    scanf("%d",&x);//输入变数x
    int data[x];//宣告阵列
    int max = 0;//让最大值假设为0
    int min = 9999999;//让最小值假设一个很大的量
    for(i = 0; i < x ; i = i + 1){
        scanf("%d",&data[i]);
        if(isPrime(data[i]) == 1){//函数中寻找出来的质数
            if (data[i] > max){//判断最大值，最小值
                max = data[i];
            }
            if (data[i] < min){
                min = data[i];
            }
        }
    }
    if (max ==0 && min == 9999999 ){
        printf("no prime number");
    } else{
        printf("max%d\n",max);//印出答案
        printf("min%d",min);
    }
    return 0;  
}