import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-order-display',
  templateUrl: './order-display.component.html',
  styleUrls: ['./order-display.component.scss']
})
export class OrderDisplayComponent implements OnInit {

  @Input() order: any;

  constructor() { }

  ngOnInit(): void {
  }

}
