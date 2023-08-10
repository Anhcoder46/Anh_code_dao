#include<iostream>
#include<cstdlib>
#include<time.h>
using namespace std;
int main() {
	int n;
	cout << "Moi ban chon" << endl;
	cout << "1.keo" << endl;
	cout << "2.bua" << endl;
	cout << "3.bao" << endl;
	back:
	do {
		cout << "Ban chon: ";
		cin >> n;
		if(cin.fail()) {
			cin.clear();
			cin.igmore();
			cout << "Thong tin ban nhap khong phai so" << endl;
		}
		if(n < 1 || n > 3)
			cout << "______________________Nhap lai_________________________";
	} while(n < 1 || n > 3);
	srand(time(0));
	int x = rand() % 2 + 1;
	if(n == x) {
		cout << "May chon" << x << endl;
		cout << "Ban va may hoa" << endl;
		cout << "________________________Choi lai nao_______________________";
		goto back;
	}
	if(n == 1 && x == 3 || n == 2 && x == 1 || n == 3 && x == 2) {
		cout << "May chon" << x << endl;
		cout << "Ban da thang" << endl;
		cout << "________________________Choi lai nao_______________________";
		goto back;
	}
	if(n == 1 && x == 2 || n == 2 && x == 3 || n == 3 && x == 1) {
		cout << "May chon" << x << endl;
		cout << "Ban da thua" << endl;
		cout << "________________________Choi lai nao_______________________";
		goto back;
	}
	system("pause");
	return 0;
}