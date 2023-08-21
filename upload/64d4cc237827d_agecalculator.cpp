#include<stdio.h>
int main()
{
	int a,b,c,x,y,z,p,q,r;
	printf("enter today date DD:MM:YYYY");
	scanf("%d:%d:%d",&x,&y,&z);
	printf("enter your date of birth");
	scanf("%d:%d:%d",&a,&b,&c);
	
	if(x<a)
	{
		x=x+30;
		y=y-1;
		if(y<b)
		{
			y=y+12;
			z=z-1;
			p=x-a;
			q=y-b;
			r=z-c;
			printf("%d days , %d months , %d years ",p,q,r);
		}
		else
		{
			p=x-a;
			q=y-b;
			r=z-c;
			printf("%d days , %d months , %d years ",p,q,r);
		}
	}
	else
	{
		p=x-a;
			q=y-b;
			r=z-c;
			printf("%d days , %d months , %d years ",p,q,r);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
