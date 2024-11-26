#define F_CPU 1000000UL
#include <avr/io.h>
#include <util/delay.h>
const uint8_t segment_display[10] = {
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
const char keypad_mapping[4][4] = {
{'7', '8', '9', '/'},
{'4', '5', '6', '*'},
{'1', '2', '3', '-'},
{'C', '0', '=', '+'}
};
void init_peripherals() {
DDRD = 0xFF;
PORTD = 0x00;
DDRC = 0x0F;
PORTC = 0xF0;
}
char read_keypad() {
for (uint8_t row = 0; row < 4; row++) {
PORTC = ~(1 << row);
for (uint8_t col = 0; col < 4; col++) {
if (!(PINC & (1 << (col + 4)))) {
_delay_ms(50);
if (!(PINC & (1 << (col + 4)))) {
return keypad_mapping[row][col];
}
}
}
}
return '\0';
}
void display_digit(uint8_t digit) {
PORTD = segment_display[digit];
}
uint8_t perform_calculation(uint8_t operand1, uint8_t operand2, char operator) {
switch (operator) {
case '+': return operand1 + operand2;
case '-': return operand1 - operand2;
case '*': return operand1 * operand2;
case '/': return (operand2 != 0) ? operand1 / operand2 : 0;
default: return 0;
}
}
int main() {
init_peripherals();
uint8_t operand1 = 0, operand2 = 0, result = 0;
char operator = '\0', key;
while (1) {
key = read_keypad();
if (key != '\0') {
if (key >= '0' && key <= '9') { 
if (operator == '\0') {
operand1 = operand1 * 10 + (key - '0');
display_digit(operand1 % 10);
} else {
operand2 = operand2 * 10 + (key - '0');
display_digit(operand2 % 10);
}
} else if (key == '+' || key == '-' || key == '*' || key == '/') {
operator = key;
} else if (key == '=') {
result = perform_calculation(operand1, operand2, operator);
operand1 = result;
operand2 = 0;
operator = '\0';
display_digit(result % 10);
} else if (key == 'C') {
operand1 = operand2 = result = 0;
operator = '\0';
PORTD = 0x00;
}
_delay_ms(200);
}
}
}