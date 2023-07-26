import { KitchenOrder } from 'src/models/KitchenOrder';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class KitchenOrderService {
  constructor(private http: HttpClient) {}

  public getKitchenOrderList(): Observable<KitchenOrder[]> {
    return this.http.get<KitchenOrder[]>(
      environment.serviceURL + '/kitchen-order'
    );
  }

  public saveKitchenOrder(kitchenOrder: KitchenOrder): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/kitchen-order`,
      kitchenOrder
    );
  }

  public getKitchenOrderById(id: string): Observable<KitchenOrder> {
    return this.http.get<KitchenOrder>(
      `${environment.serviceURL}/kitchen-order/${id}`
    );
  }

  public findByBeginDate(beginDate: string): Observable<KitchenOrder[]> {
    return this.http.get<KitchenOrder[]>(
      `${environment.serviceURL}/kitchen-order/begin-date/${beginDate}`
    );
  }

  public findByStatus(status: string): Observable<KitchenOrder[]> {
    return this.http.get<KitchenOrder[]>(
      `${environment.serviceURL}/kitchen-order/status/${status}`
    );
  }

  public findByEndDate(endDate: string): Observable<KitchenOrder[]> {
    return this.http.get<KitchenOrder[]>(
      `${environment.serviceURL}/kitchen-order/end-date/${endDate}`
    );
  }

  public findByAllColumns(value: string): Observable<KitchenOrder[]> {
    return this.http.get<KitchenOrder[]>(
      `${environment.serviceURL}/kitchen-order/all/${value}`
    );
  }

  public updateKitchenOrder(kitchenOrder: KitchenOrder): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/kitchen-order/${kitchenOrder.id}`,
      kitchenOrder
    );
  }

  public deleteKitchenOrder(id: string): Observable<void> {
    return this.http.delete<void>(
      `${environment.serviceURL}/kitchen-order/${id}`
    );
  }
}
