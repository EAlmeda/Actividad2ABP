import { Booking } from 'src/models/Booking';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class BookingService {
  constructor(private http: HttpClient) {}

  public getBookingList(): Observable<Booking[]> {
    return this.http.get<Booking[]>(environment.serviceURL + '/booking');
  }

  public saveBooking(booking: Booking): Observable<void> {
    return this.http.post<void>(`${environment.serviceURL}/booking`, booking);
  }

  public getBookingById(id: string): Observable<Booking> {
    return this.http.get<Booking>(`${environment.serviceURL}/booking/${id}`);
  }

  public findByBookerName(name: string): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/name/${name}`
    );
  }

  public findByBookerPhone(phone: string): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/phone/${phone}`
    );
  }

  public findByBookerEmail(email: string): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/email/${email}`
    );
  }

  public findByPeopleQuantity(peopleQuantity: number): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/people-quantity/${peopleQuantity}`
    );
  }

  public findByDate(date: string): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/date/${date}`
    );
  }

  public findByAllColumns(value: string): Observable<Booking[]> {
    return this.http.get<Booking[]>(
      `${environment.serviceURL}/booking/all/${value}`
    );
  }

  public updateBooking(booking: Booking): Observable<void> {
    return this.http.post<void>(
      `${environment.serviceURL}/booking/${booking.id}`,
      booking
    );
  }

  public deleteBooking(id: string): Observable<void> {
    return this.http.delete<void>(`${environment.serviceURL}/booking/${id}`);
  }
}
