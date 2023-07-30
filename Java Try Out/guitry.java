import javax.swing.JOptionPane;
public class guitry{
    public static void main(String ar[]){
        String name=JOptionPane.showInputDialog("Enter your name:");
        int age=Integer.parseInt(JOptionPane.showInputDialog("Enter The Age"));
        Double weight=Double.parseDouble(JOptionPane.showInputDialog("Enter The Weight"));
        JOptionPane.showMessageDialog(null,"Your name is "+name+" and your age is "+age+" and your weight is "+weight);

    }
}