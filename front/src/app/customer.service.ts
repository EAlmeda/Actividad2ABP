import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { OnlineOrder } from 'src/models/OnlineOrder';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {

  constructor(private http: HttpClient) { }

  public getOnlineOrdersByCustomer(id): Observable<any> {
    return this.http.get<OnlineOrder[]>(
      environment.serviceURL + '/customer/'+id+'/online-order'
    );
  }
}
