#include<stdio.h>
int main ()
{
	int a,b,c,d;
	printf("enter a ");
	scanf("%d",&a);
	printf("enter b");
	scanf("%d",&b);
	printf("enter 1 for addition and press 2 for subtraction ");
	scanf("%d",&c);
	switch(c)
	{
		case 1:{d=a+b;
		printf("%d",d);
			break;
		} 
		case 2:{d=a-b;
		printf("%d",d);
			break;
		}
		default:printf("invalid input");
	}
	return 0;
}
