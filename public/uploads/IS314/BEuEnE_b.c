/*
Problem : Dodo and Pyramids It is Sport's Day and Dodo is incharge of human pyramid display. The human pyramid will have N levels, 
first level consisting of N people, second level consisting of N - 1 people, third level consisting of N - 2 people and so on till 
the final level that has only person.

Dodo wants to see his crush practising her performance so help him with the task of calculating the number of people required for the 
human pyramid. 

Solution : The problem basically requires you to find the sum of numbers N + (N+1) + (N+2) ... 1. We could either iterate through the numbers
between 1 and N, or use a direct forumla to find the sum of first N natural numbers i.e. (N*(N+1))/2.
*/

#include<stdio.h>
int main(){
	int i, n, t, result;
	scanf("%d",&t);

	for(i=1; i<=t; i++){
		
		scanf("%d",&n);
		result = (n * (n+1))/2;
		printf("%d\n",result);
	}
}