import java.util.*;
class Cashier{
	int cashierid;
	String cashiername;
	Cashier(int n,String s){
		this.cashierid=n+101;
		this.cashiername=s;
	}
}
class Product{
	int productid,productstock;
	float productprice;
	String productname;
	Product(int n,String s,float p,int a){
		this.productid=n+10001;
		this.productname=s;
		this.productprice=p;
		this.productstock=a;
	}
}
class Billing{
	int billid,productid,stock;
	String customername,productname;
	Billing(int n,int m,String c,String p,int s){
		this.billid=n+1001;
		this.productid=m;
		this.customername=c;
		this.productname=p;
		this.stock=s;
	}
}
public class Main{
	static Scanner sc=new Scanner(System.in);
	public static void main(String args[]){
		boolean f=true,f1=true,f2=true,f3=true,f4=true;
		int i,m=0,j,numcashier=-1,productcount=-1,billcount=-1;
		Cashier c[]=new Cashier[100];
		Product p[]=new Product[100];
		Billing b[]=new Billing[100];
		f=true;
		while(f){
			System.out.println("Billing System\n 1.Owner\n 2.Cashier\n 3.Exit\n");
			int bchoice=sc.nextInt();
			if(bchoice==1){
				System.out.println("Owner Login\nEnter your Name:");
				String ownername=sc.next();
				System.out.println("Enter the Password");
				String ownerpass=sc.next();
				if(ownername.equals("r")&&ownerpass.equals("r")){
					f1=true;
					while(f1){
						System.out.println("\n 1.Add Cashier\n 2.Show details\n 3.Report\n 4.Exit\n");
						int ochoice=sc.nextInt();
						f2=true;
						while(f2){
							if(ochoice==1){
								numcashier++;
								System.out.print("Enter Cashier Name\n");
								c[numcashier]=new Cashier(numcashier,sc.next());
								System.out.println("Cashier id   Cashier Name");
								System.out.println(c[numcashier].cashierid+"\t     "+c[numcashier].cashiername);
								System.out.println("Cashier Added Suceesfully");
								f2=false;
							}
							else if(ochoice==2){
								System.out.println("Cashier id   Cashier Name");
								if(numcashier<0){
									System.out.println("No Cashier Added\n");
								}
								else{
									for(i=0;i<=numcashier;i++){
										System.out.println(c[i].cashierid+"\t     "+c[i].cashiername+"\n");
									}
								}
								System.out.println("Product Id      Product name    Price   Stock");
								if(productcount<0){
									System.out.println("No Product are Added\n");
								}
								else{
									for(i=0;i<=productcount;i++){
										if(p[i].productid-10000!=0){
											System.out.println(p[i].productid+"           "+p[i].productname+"       "+p[i].productprice+"      "+p[i].productstock);
										}
									}
								}
								System.out.println("Bill Id      Product Id     Customer name   Product name    Stock  Price");
									if(billcount<0){
										System.out.println("No bill are Added\n");
									}
									else{
										for(i=0;i<=billcount;i++){
											if(b[i].billid!=0){
												System.out.println(b[i].billid+"         "+b[i].productid+"          "+b[i].customername+"               "+b[i].productname+"          "+b[i].stock+"      "+((p[b[i].productid-10001].productprice*b[i].stock)+((p[b[i].productid-10001].productprice*b[i].stock)*20/100)));
											}
										}
									}
								f2=false;
							}
							else if(ochoice==3){
								System.out.println("Report");
								f2=false;
							}
							else if(ochoice==4){
								f2=false;
								f1=false;
							}
							else{
								System.out.println("Please enter a valid number!!!");
								f2=false;
							}
						}
					}
				}
				else{
					System.out.println("Name/Password Incorrect\n");
				}
			}
			else if(bchoice==2){
				if(numcashier<0){
					System.out.println("No Cashier are added by Owner\n");
				}
				else{
					System.out.println("Cashier Login\nEnter Cashier id:");
					int cashid=sc.nextInt();
					String cashname=sc.next();
					for(i=0;i==0;i++){
						if(cashid==c[i].cashierid&&cashname.equals(c[i].cashiername)){
							f2=true;
							while(f2){
								System.out.print(" 1.Stock Entry\n 2.Bill Entry\n 3.Exit\n");
								int cchoice=sc.nextInt();
								f4=true;
								while(f4){
									if(cchoice==1){
									System.out.println(" 1.Add Stock\n 2.Update Stock\n 3.Delete Stock\n 4.Show Stock\n 5.Exit");
									int ccchoice=sc.nextInt();
									f3=true;
									while(f3){
										if(ccchoice==1){
											productcount++;
											System.out.println("Enter Product Name    Prize   Stock\n");
											p[productcount]=new Product(productcount,sc.next(),sc.nextFloat(),sc.nextInt());
											System.out.println("Product Id      Product name    Price   Stock");
											System.out.println(p[productcount].productid+"           "+p[productcount].productname+"       "+p[productcount].productprice+"      "+p[productcount].productstock);
											System.out.println("Product Added Sucessfully");
											f3=false;
										}
										else if(ccchoice==2){
											if(productcount>=0){
												System.out.println("Enter the Stock Id to update\n");
												int stockid=sc.nextInt();
													if(stockid==p[stockid-10001].productid){
														System.out.println("Enter Product Name,price,available stock");
														p[stockid-10001]=new Product(p[stockid-10001].productid-10001,sc.next(),sc.nextFloat(),sc.nextInt());
													}
													else{
														System.out.println("No Product available on given Id");
														break;
													}
												f3=false;
											}
											else{
												System.out.println("No Products are added");
												f3=false;
											}
										}
										else if(ccchoice==3){
											if(productcount>=0){
												System.out.println("Enter the Stock Id to delete\n");
												int stockid=sc.nextInt();
												for(i=0;i<=productcount;i++){
													if(stockid==p[i].productid){
														p[i]=new Product(-10001,null,0,0);
														System.out.println("Product deleted sucessfully");
													}
													else{
														System.out.println("No Product available on given Id");
													}
												}
												f3=false;
											}
											else{
												System.out.println("No Products are added");
												f3=false;
											}
										}
										else if(ccchoice==4){
											System.out.println("Product Id      Product name    Price   Stock");
											if(productcount<0){
												System.out.println("No Product are Added");
											}
											else{
												for(i=0;i<=productcount;i++){
													if(p[i].productid!=0){
														m++;
														System.out.println(p[i].productid+"           "+p[i].productname+"       "+p[i].productprice+"      "+p[i].productstock);
													}
													if(m==0){
														System.out.println("No Product are Added");
													}
												}
											}
											f3=false;
										}
										else if(ccchoice==5){
											f4=false;
											f3=false;
											
										}
									}
								}
								if(cchoice==2){
									System.out.println("Bill Entry\n 1.Add Bill\n 2.Update Bill\n 3.Delete Bill\n 4.Show Bill\n 5.Exit\n");
									int ccchoice=sc.nextInt();
									f3=true;
									while(f3){
										if(ccchoice==1){
											if(productcount>=0){
												billcount++;
												System.out.println("Enter Product Id     Customer name     Product name     Stock");
												int pdid=sc.nextInt();
												String cn=sc.next();
												String pn=sc.next();
												int ss=sc.nextInt();
												f4=true;
												while(f4){
													if(p[pdid-10001].productstock-ss>0){
													b[billcount]=new Billing(billcount,pdid,cn,pn,ss);
													for(i=0;i<=productcount;i++){
														if(b[billcount].productid==p[i].productid){
															p[i].productstock-=b[billcount].stock;
															if(p[i].productstock<0){
																System.out.println("No Stock Available\n");
																f4=false;
																break;
															}
															else{
																System.out.println("Bill Id      Product Id     Customer name   Product name    Stock  Price");
																System.out.println(b[billcount].billid+"         "+b[billcount].productid+"          "+b[billcount].customername+"               "+b[billcount].productname+"          "+b[billcount].stock+"      "+((p[b[billcount].productid-10001].productprice*b[billcount].stock)+((p[b[billcount].productid-10001].productprice*b[billcount].stock)*20/100)));
																System.out.println("Bill Generated Sucessfully");
																f4=false;
															}
														}
													}
													f3=false;
												}
												else{
													System.out.println("No Stock available");
												}
												f3=false;
												f4=false;
												}
											}
											else{
												System.out.println("No Product to billing\n");
												f3=false;
											}
										}
										else if(ccchoice==2){
											if(billcount>=0){
												System.out.println("Enter the Bill Id to update\n");
												int billid=sc.nextInt();
												for(i=0;i<=billcount;i++){
													if(billid==b[i].billid){
														System.out.println("Product Id	Total Stock");
														int pdid=sc.nextInt();
														String cn=b[i].customername;
														String pn=b[i].productname;
														int ps=sc.nextInt();
														for(j=0;j<=productcount;j++){
															if(p[j].productid==pdid){
																System.out.print("True");
																if(ps<=0){
																	p[j].productstock=p[j].productstock-ps;
																}
																else{
																	p[j].productstock=p[j].productstock-ps;
																}
															}
															else{
																System.out.println("Enter the correct product id");
															}
														}
														ps=b[i].stock+ps;
														b[i]=new Billing(billcount,pdid,cn,pn,ps);
														System.out.println("Bill Id      Product Id     Customer name   Product name    Stock  Price");
														System.out.println(b[i].billid+"         "+b[i].productid+"          "+b[i].customername+"               "+b[i].productname+"          "+b[i].stock+"      "+((p[b[i].productid-10001].productprice*b[i].stock)+((p[b[i].productid-10001].productprice*b[i].stock)*20/100)));
														System.out.println("Bill updated Sucessfully");
													}
													else{
														System.out.println("No Bill available on given Id");
														
													}
												}
												f3=false;
											}
											else{
												System.out.println("No Bills up to date!!!");
												f3=false;
											}
										}
										else if(ccchoice==3){
											if(productcount>=0){
												System.out.println("Enter the Bill Id to delete\n");
												int billid=sc.nextInt();
												for(i=0;i<=billcount;i++){
													if(billid==b[i].billid){
														b[i]=new Billing(-1001,0,null,null,0);
													}
													else{
														System.out.println("No Bill available on given Id");
													}
												}
												f3=false;
											}
											else{
												System.out.println("No Bills to delete");
												f3=false;
											}
										}
										else if(ccchoice==4){
											System.out.println("Bill Id      Product Id     Customer name   Product name    Stock  Price");
											if(billcount<0){
												System.out.println("No bill are Added");
											}
											else{
												for(i=0;i<=billcount;i++){
													if(b[i].billid!=0){
														System.out.println(b[i].billid+"         "+b[i].productid+"          "+b[i].customername+"               "+b[i].productname+"          "+b[i].stock+"      "+((p[b[i].productid-10001].productprice*b[i].stock)+((p[b[i].productid-10001].productprice*b[i].stock)*20/100)));
													}
												}
											}
											f3=false;
										}
										else if(ccchoice==5){
											f4=false;
											f3=false;
										}
									}
								}
								if(cchoice==3){
									f3=false;
									f4=false;
									f2=false;
								}
								}
							}
						}
						else{
							System.out.println("Invalid Id/Name\n");
						}
					}
				}
			}
			else if(bchoice==3){
				System.out.println("Do you want exit?\n Press 1 for exit or any number to cancel\n");
				int echoice=sc.nextInt();
				if(echoice==1){
					break;
				}
			}
			else{
				System.out.println("Please enter the correct choice!!!\n");
			}
		}
	}
}
