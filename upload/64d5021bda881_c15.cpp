#include<stdio.h>
int main ()
{
	int i,j,n,sum=0,fact;
	printf("enter the number\n");
	scanf("%d",&n);
	int sample_n=n;
	 while(n!=0)
	 {
	 	int x=n%10;
		fact=1;
		for(j=1;j<=x;j++)
		{
			fact=fact*j;
		}
		sum=sum+fact;	
		n=n/10;
	 }
	
	printf("sum is %d",sum); 
	if(sum==sample_n)
	printf("strong number");
	else printf("not strong number ");
	
	
}
