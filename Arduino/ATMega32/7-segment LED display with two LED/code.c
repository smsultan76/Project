#include <avr/io.h>
#include <util/delay.h>

uint8_t sm2[10] = {
	0b00111111,
	0b00000110,
	0b01011011,
	0b01001111,
	0b01100110,
	0b01101101,
	0b01111101,
	0b00000111,
	0b01111111, 
	0b01101111  
};

int main(void) {
	DDRB = 0xFF;
	DDRC = 0xFF;

	while (1) {
		for (int i = 0; i < 10; i++) {
			PORTB = sm2[i];
		for (int j = 0; j < 10; j++) {
			PORTC = sm2[j];
			_delay_ms(250);
		}
		}
	}

	return 0;
}
