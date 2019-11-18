import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
public class testInterface {

    /**
     * Fonction avec le test de la connexion
     */
    private void testConnexion(){
        String url = "http://localhost/Managis/Managis/Web/index.php";
        System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");
        WebDriver driver = new ChromeDriver();

        driver.get(url);

        driver.findElement(By.id("connexion")).click();
        driver.findElement(By.id("pseudo")).click();
        driver.findElement(By.id("pseudo")).sendKeys("toto");
        driver.findElement(By.id("mdp")).click();
        driver.findElement(By.id("mdp")).sendKeys("ss");
        driver.findElement(By.name("form")).click();
    }

    public static void main (String [] args){

        //Instance de la classe
       testInterface inter = new testInterface();

       //On lance la fonction
       inter.testConnexion();
    }
}
