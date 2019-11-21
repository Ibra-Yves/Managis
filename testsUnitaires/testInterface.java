import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import static org.junit.jupiter.api.Assertions.*;

class testInterface {

    @org.junit.jupiter.api.Test
    void testConnexionTrue() {
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

        //Test sur une balise quand on est exclusivement connecté
        String valRetour =  driver.findElement(By.id("espaceMembre")).getText();
        assertEquals("GESTION DE COMPTE", valRetour);

    }

    @org.junit.jupiter.api.Test
    void testConnexionFalse(){
        String url = "http://localhost/Managis/Managis/Web/index.php";
        System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");
        WebDriver driver = new ChromeDriver();

        driver.get(url);

        driver.findElement(By.id("connexion")).click();
        driver.findElement(By.id("pseudo")).click();
        driver.findElement(By.id("pseudo")).sendKeys("toto");
        driver.findElement(By.id("mdp")).click();
        driver.findElement(By.id("mdp")).sendKeys("s");
        driver.findElement(By.name("form")).click();

        //Test lorsqu'on obtient une erreur lors du tapage du mot de passe
        String valRetour =  driver.findElement(By.id("errorForm")).getText();
        assertEquals("Le pseudo ou le mot de passe est incorrect", valRetour);
    }
}