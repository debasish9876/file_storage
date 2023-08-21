#include<stdio.h>
int main ()
{
	int old,prv;
	old=0;
	prv=1;
	int cur;
	printf(" %d %d",old,prv);
		
	for(int i=1;i<10;i++)
	{
		cur=old+prv;
		printf(" %d",cur);
		old=prv;
		prv=cur;
	}
}
