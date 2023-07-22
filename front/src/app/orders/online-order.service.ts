import { OnlineOrder } from 'src/models/OnlineOrder';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class OnlineOrderService {
  constructor(private http: HttpClient) {}

  public getOnlineOrderList(): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      environment.serviceURL + '/online-order'
    );
  }

  public saveOnlineOrder(onlineOrder: OnlineOrder): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/online-order`,
      onlineOrder
    );
  }

  public getOnlineOrderById(id: string): Observable<OnlineOrder> {
    return this.http.get<OnlineOrder>(
      `${environment.serviceURL}/online-order/${id}`
    );
  }

  public findByAmount(amount: number): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/amount/${amount}`
    );
  }

  public findByDate(date: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/date/${date}`
    );
  }

  public findByExpectedDate(expectedDate: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/expected-date/${expectedDate}`
    );
  }

  public findByAddress(address: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/address/${address}`
    );
  }

  public findByStatus(status: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/status/${status}`
    );
  }

  public findByType(type: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/type/${type}`
    );
  }

  public findByAllColumns(value: string): Observable<OnlineOrder[]> {
    return this.http.get<OnlineOrder[]>(
      `${environment.serviceURL}/online-order/all/${value}`
    );
  }

  public updateOnlineOrder(onlineOrder: OnlineOrder): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/online-order/${onlineOrder.id}`,
      onlineOrder
    );
  }

  public deleteOnlineOrder(id: string): Observable<void> {
    return this.http.delete<void>(
      `${environment.serviceURL}/online-order/${id}`
    );
  }
}
