void setup() {
  Serial.begin(9600);

}
void loop() {
  float temperatura = (float(analogRead(A0))*5/(1023))/0.01;  
  Serial.println(temperatura);
  delay(1000);
}
