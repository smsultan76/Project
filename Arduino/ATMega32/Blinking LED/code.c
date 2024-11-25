#include <avr/io.h>

int main(void)
{
	//Select PB0 as output pin
    	DDRB |= 1<<DDD0;


	//Turn on the LED
	PORTB |= 1<<PB0;
}
