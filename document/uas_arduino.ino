int ledPin[] = {3,5,6,9};
int pingPin[] = {4,7,10,12};
int echoPin[] = {2,8,11,13};
int sevenSegmentPin[] = {A0,A1,A2,A3,A4,A5}; //a,b,c,d,e,f,g
int distanceResult[4];
boolean isFirst = true;
void setup() {
  // put your setup code here, to run once:
  for(int a = 0; a< (sizeof(pingPin)/sizeof(pingPin[0])); a++){
    pinMode(ledPin[a],OUTPUT);
  }
  Serial.begin(9600);
}

void loop() {
  playCountDown();
  // put your main code here, to run repeatedly:
  /*for(int value = 0; value <= 255; value++){
    analogWrite(pwmPin, value);
    analogWrite(pwmPin2, value);
    analogWrite(pwmPin3, value);
    analogWrite(pwmPin4, value);
    delay(30);
  }
  for(int value = 255; value >= 0; value--){
    analogWrite(pwmPin, value);
    analogWrite(pwmPin2, value);
    analogWrite(pwmPin3, value);
    analogWrite(pwmPin4, value);
    delay(30);
  }
  */
    long duration, inches, cm,start;

    for(int a = 0; a< (sizeof(pingPin)/sizeof(pingPin[0])); a++){ //ini untuk nembak per ping sensor
      pinMode(pingPin[a], OUTPUT);
      pinMode(echoPin[a], INPUT);
      
      digitalWrite(pingPin[a], LOW);
      delayMicroseconds(2);
      digitalWrite(pingPin[a], HIGH);
      delayMicroseconds(5);
      digitalWrite(pingPin[a], LOW);
      
      duration = pulseIn(echoPin[a], HIGH);
    
      inches = microsecondsToInches(duration);
      distanceResult[a] = microsecondsToCentimeters(duration);
      Serial.print("ini dari port = " + a);
      Serial.print(distanceResult[a]);
      Serial.print("cm");
      Serial.println();
    }
    int minValueIndex = compare(); //lempar ke method compare
    switch(minValueIndex){ //dievaluasi index mana (lampu ke berapa start:0 yang nyala)
      case 0: 
      Serial.println("nyala lampu 1");
      digitalWrite(ledPin[0],HIGH);
      digitalWrite(ledPin[1],LOW);
      digitalWrite(ledPin[2],LOW);
      digitalWrite(ledPin[3],LOW);
      break;
      case 1: 
      
      Serial.println("nyala lampu 2");
      digitalWrite(ledPin[0],LOW);
      digitalWrite(ledPin[1],HIGH);
      digitalWrite(ledPin[2],LOW);
      digitalWrite(ledPin[3],LOW);
      break;
      case 2: 
      
      Serial.println("nyala lampu 3");
      digitalWrite(ledPin[0],LOW);
      digitalWrite(ledPin[1],LOW);
      digitalWrite(ledPin[2],HIGH);
      digitalWrite(ledPin[3],LOW);
      break;
      case 3: 
      
      Serial.println("nyala lampu 4");
      digitalWrite(ledPin[0],LOW);
      digitalWrite(ledPin[1],LOW);
      digitalWrite(ledPin[2],LOW);
      digitalWrite(ledPin[3],HIGH);
      break;
    }
  //delay(1000);
}

long microsecondsToInches(long microseconds) {
  return microseconds / 74 / 2;
}

long microsecondsToCentimeters(long microseconds) {
  return microseconds / 29 / 2;
}
int compare(){
  int maxValue = 9999; //minValue
  int maxValueIndex = 0; //minValueIndex
  for(int a = 0; a< (sizeof(distanceResult) / sizeof(distanceResult[0])); a++){
    if(distanceResult[a] < maxValue){ //kalau ada yang lebih dekat (ada object dibawahnya)
      maxValue = distanceResult[a]; //max
      maxValueIndex = a; 
    }
  }
  return maxValueIndex; //kembaliin index ke berapa
}
void playCountDown(){
  if(isFirst){
    for(int a = 0; a< (sizeof(sevenSegmentPin)/sizeof(sevenSegmentPin[0])); a++){
      pinMode(sevenSegmentPin[a],OUTPUT);
    }
/*MAPPINT 
       0
       _
    5 |_| 1
    4 |_| 2
       
       3
 {6 DI TENGAH}
 1 = NYALA
 0 = MATI
 */
    //tulis 5
    digitalWrite(sevenSegmentPin[0],1); //A0 a & d
    digitalWrite(sevenSegmentPin[1],0); //A1 b
    digitalWrite(sevenSegmentPin[2],1); //A2 c
    digitalWrite(sevenSegmentPin[3],0); //A3 e
    digitalWrite(sevenSegmentPin[4],1); //A4 f
    digitalWrite(sevenSegmentPin[5],1); //A5 g
    delay(1000);
    //tulis 4
    digitalWrite(sevenSegmentPin[0],0);
    digitalWrite(sevenSegmentPin[1],1);
    digitalWrite(sevenSegmentPin[2],1);
    digitalWrite(sevenSegmentPin[3],0);
    digitalWrite(sevenSegmentPin[4],1);
    digitalWrite(sevenSegmentPin[5],1);
    delay(1000);
    //tulis 3
    digitalWrite(sevenSegmentPin[0],1);
    digitalWrite(sevenSegmentPin[1],1);
    digitalWrite(sevenSegmentPin[2],1);
    digitalWrite(sevenSegmentPin[3],0);
    digitalWrite(sevenSegmentPin[4],0);
    digitalWrite(sevenSegmentPin[5],1);
    delay(1000);
    //tulis 2
    digitalWrite(sevenSegmentPin[0],1); //a d
    digitalWrite(sevenSegmentPin[1],1); // b
    digitalWrite(sevenSegmentPin[2],0); // c
    digitalWrite(sevenSegmentPin[3],1); // e
    digitalWrite(sevenSegmentPin[4],0); // f
    digitalWrite(sevenSegmentPin[6],1); // g
    delay(1000);
    //tulis 1
    digitalWrite(sevenSegmentPin[0],0);
    digitalWrite(sevenSegmentPin[1],1);
    digitalWrite(sevenSegmentPin[2],1);
    digitalWrite(sevenSegmentPin[3],0);
    digitalWrite(sevenSegmentPin[4],0);
    digitalWrite(sevenSegmentPin[5],0);
    delay(1000);
    //tulis 0
    digitalWrite(sevenSegmentPin[0],1);
    digitalWrite(sevenSegmentPin[1],1);
    digitalWrite(sevenSegmentPin[2],1);
    digitalWrite(sevenSegmentPin[3],1);
    digitalWrite(sevenSegmentPin[4],1);
    digitalWrite(sevenSegmentPin[5],0);
    delay(3000);
    isFirst = false;
  }
  //code 5 - 1
  
}
