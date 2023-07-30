import java.util.*;
public class Wordreversal{
    public static void main(String arg[]) {
        Scanner sc=new Scanner(System.in);
        String s=sc.nextLine();
        char b[]=s.toCharArray();
        char a[][]=new char[100][100];
        int i,j=0,n=s.length();
        for(i=0;i<n;i++,j++){
                if(b[i]!=' '){
                    a[i][j]=b[i];
                }
                else{
                    a[i][j]='\0';
                    j=0;
                }
        }
        for(i=j-1;i>0;i--){
            for(j=0;j<n;j++){
                System.out.print(a[i][j]);
            }
        }
        
    }
}