import processing.serial.*; 
import http.requests.*;

String[] a;
int end = 10;    
String serial;   
Serial port;

void setup() {
  port = new Serial(this, Serial.list()[0], 9600); 
  port.clear();  
  serial = port.readStringUntil(end);
  serial = null; 
}

void draw() 
{

  while (port.available() > 0) 
  { 
    serial = port.readStringUntil(end);
  }
  if (serial != null) 
  {  
    function();
  }
}

void function()
{
  PostRequest post = new PostRequest("http://temperaturaredes.esy.es/scripts/insert_temp.php");
  post.addData("temp", serial);
  post.send();
  println("Reponse Content: " + post.getContent());
  println("Reponse Content-Length Header: " + post.getHeader("Content-Length"));
  delay(10000);
}
