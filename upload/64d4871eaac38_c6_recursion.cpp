#include<stdio.h>
int fact(int);
int main ()
{
	int x;
	printf("enter the value of x \n");
	scanf("%d",&x);
	 printf("factorila is %d ", fact(x));
}
int fact(int n)
{
	if(n==0)
	{
		return 1;
	}
	int fact_m=fact(n-1);
	int factorial=fact_m*n;
	return factorial;
}
