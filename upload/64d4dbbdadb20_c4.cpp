#include<stdio.h>
int main ()
{
	int x,i;
	
	x=5;
	for(i=1;i<=5;i++){
		if(i%x==0)
		printf("%d\n",i);
	}
}
